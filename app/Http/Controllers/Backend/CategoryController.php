<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{

        //========Category Show=======
        function category(){
            $category = Category::latest()->paginate(10);
            return view('admin.Category.category',compact('category'));
        }
        
        //========Category Add=======
        function add_category(){
            request()->validate([
                'category_name' => 'required|unique:categories,category_name'
            ],[
                'category_name.required' => 'Please Provide Category Name!'
            ]);

            Category::create([
                'category_name' => request()->category_name,
                'created_at' => Carbon::now(),
            ]);

            return back()->with('success','Category Added Successfully!');
        
        }

        //========Category Edit=======
        function edit_category($id){
            $category_edit = Category::find($id);
            return view('admin.Category.category_edit',compact('category_edit'));
        
        }

        //========Category Update=======
        function update_category(){

            request()->validate([
                'category_name' => 'required|unique:categories,category_name'
            ],[
                'category_name.required' => 'Please Provide Category Name!'
            ]);

            Category::find(request()->category_id)->update([
            'category_name' => request()->category_name,
            ]);       
            return redirect('/admin/category')->with('update_success','Category Updated Successfully!');
            
        }

        //========Category Delete=======
        function delete_category($id){

            Category::find($id)->delete();
            return redirect('/admin/category')->with('delete_success','Category Deleted Successfully!');
            
        }

        //========Category Inactive=======
        function inactive_category($id){
            Category::find($id)->update([
                'status' => 2
            ]);
            return redirect('/admin/category')->with('cat_inactive','Category Inactive Successfully!');
            
        }

        //========Category Active=======
        function active_category($id){

            Category::find($id)->update([
                'status' => 1
            ]);
            return redirect('/admin/category')->with('cat_active','Category Active Successfully!');
        }










}
