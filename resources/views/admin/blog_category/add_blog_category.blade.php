@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Blog Category </h4>

                            <form method="POST" action="{{ route('store.newcategory') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New Category</label>
                                    <div class="col-sm-10">
                                        <input name="blog_category" class="form-control" type="text" value="{{old('blog_category')}}">
                                        <x-input-error :messages="$errors->get('blog_category')" class="mt-2" />
                                    </div>
                                </div>
                                <!-- end row -->

                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Add New Category">
                            </form>



                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>
@endsection
