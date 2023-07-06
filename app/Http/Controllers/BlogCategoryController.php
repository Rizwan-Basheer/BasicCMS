<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {

        $all_cate = BlogCategory::all();

        return view('admin.blog_category.all_blog_category', compact('all_cate'));
    } // End Method

    public function AddBlogCategory()
    {

        return view('admin.blog_category.add_blog_category');
    } // End Method

    public function StoreNewCategory(Request $request)
    {

        $request->validate([
            'blog_category' => ['required', 'string', 'max:255'],
        ]);

        BlogCategory::create([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Category created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function EditBlogCategory($id)
    {
      $cate = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_blog_category',compact('cate'));
    } // End Method

    public function UpdateBlogCategory(Request $request)
    {
      $cate_id = $request->id;

      BlogCategory::findOrFail($cate_id)->update([
        'blog_category' => $request->blog_category,

    ]);
    $notification = array(
        'message' => 'Category Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.blog.categories')->with($notification);
    } // End Method

    public function DeleteBlogCategory($id)
    {

        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method
}
