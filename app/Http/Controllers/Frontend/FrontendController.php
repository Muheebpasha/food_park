<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index() {
        $sliders = Slider::where('status',1)->get();
        $sectionTitles = $this->getStatusTitles();
        $whyChooseUs = WhyChooseUs::where('status',1)->get();
        $categories = Category::where(['show_at_home' => 1, 'status' => 1])->get();

       return view('frontend.home.index',compact('sliders','whyChooseUs','categories'));
    }

    function getStatusTitles() : Collection
    {
        $keys = [
            'why_choose_us_top_title',
            'why_choose_us_main_title',
            'why_choose_us_sub_title'
        ];
        return SectionTitle::whereIn('key',$keys)->pluck('value','key');
    }

    function showProduct(string $slug) : View {
        $product = Product::with(['productImages', 'productSizes', 'productOptions'])->where(['slug' => $slug, 'status' => 1])
        ->withAvg('reviews', 'rating')
        ->withCount('reviews')
        ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)->take(8)
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->latest()->get();
        $reviews = ProductRating::where(['product_id' => $product->id, 'status' => 1])->paginate(30);
        return view('frontend.pages.product-view', compact('product', 'relatedProducts', 'reviews'));
    }
    function loadProductModal($productId) {
        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($productId);
        return view('frontend.layouts.ajax-files.product-popup-modal', compact('product'))->render();
    }

    function productReviewStore(Request $request) {
        $request->validate([
            'rating' => ['required', 'min:1', 'max:5', 'integer'],
            'review' => ['required', 'max:500'],
            'product_id' => ['required', 'integer']
        ]);

        $user = Auth::user();

        $hasPurchased = $user->orders()->whereHas('orderItems', function($query) use ($request){
            $query->where('product_id', $request->product_id);
        })
        ->where('order_status', 'delivered')
        ->get();


        if(count($hasPurchased) == 0){
            throw ValidationException::withMessages(['Please Buy The Product Before Submit a Review!']);
        }

        $alreadyReviewed = ProductRating::where(['user_id' => $user->id, 'product_id' => $request->product_id])->exists();
        if($alreadyReviewed){
            throw ValidationException::withMessages(['You already reviewed this product']);
        }

        $review = new ProductRating();
        $review->user_id = $user->id;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->status = 0;
        $review->save();

        toastr()->success('Review added successfully and waiting to approve');

        return redirect()->back();
    }
}
