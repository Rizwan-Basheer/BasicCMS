<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $all_blog = Blog::latest()->get();

        return view('admin.blogs.all_blog', compact('all_blog'));
    } // End Method

    public function AddBlog()
    {
        $category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.add_blog', compact('category'));
    } // End Method

    public function StoreBlog(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required',

        ], [

            'blog_category_id.required' => 'Blog Category is Required',
            'blog_title.required' => 'blog Title is Required',
        ]);

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;

        blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_description' => $request->blog_description,
            'blog_tags' => $request->blog_tags,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'blog Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    } // End Method

    public function EditBlog($id)
    {

        $blog = Blog::findOrFail($id);
        $category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.edit_blog', compact('blog', 'category'));
    } // End Method

    public function UpdateBlog(Request $request)
    {
        // dd($request->id);
        $id = $request->id;
        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;

            blog::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_description' => $request->blog_description,
                'blog_tags' => $request->blog_tags,
                'blog_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'blog Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog')->with($notification);
        }
        blog::findOrFail($id)->update([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_description' => $request->blog_description,
            'blog_tags' => $request->blog_tags,

        ]);
        $notification = array(
            'message' => 'blog Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    } // End Method

    public function DeleteBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $img = $blogs->blog_image;
        unlink($img);

        blog::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    } // End Method

    public function BlogDetails($id)
    {
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::latest()->limit(5)->get();
        $blog = Blog::findOrFail($id);

        return view('frontend.blog_details',compact('blog','allblogs','categories'));
    } // End Method
    public function CategoryBlog($id)
    {
        $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::latest()->limit(5)->get();


        return view('frontend.cat_blog_details',compact('blogpost','allblogs','categories'));
    } // End Method
}
