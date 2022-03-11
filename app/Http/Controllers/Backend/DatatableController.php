<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Setting\Currency;
use App\Models\Backend\Setting\Vat;
use App\Models\Backend\Setting\Warehouse;
use App\Models\Backend\Product\Unit;
use App\Models\Backend\Product\Brand;
use App\Models\Backend\Product\Category;
use App\Models\Backend\Product\SubCategory;
use App\Models\Backend\Product\SubSubCategory;
use App\Models\Backend\Product\Product;
use App\Models\Backend\Contact\Contact;
use App\Models\Backend\Contact\ContactCategory;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function ContactCategoryTable()
    {
        $Query = ContactCategory::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })

            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['image', 'action'])
            ->toJSON();
    }

    public function CustomerTable()
    {
        $Query = Contact::query()->whereType('Customer')->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })

            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['action'])
            ->toJSON();
    }

    public function SupplierTable()
    {
        $Query = Contact::query()->whereType('Supplier')->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })

            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['action'])
            ->toJSON();
    }

    public function StaffTable()
    {
        $Query = Contact::query()->whereType('Staff')->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })

            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['action'])
            ->toJSON();
    }
    public function ProductTable(Request $request)
    {
        $Query = Product::with('Category:id,name')->orderBy('id', 'desc');
        if ($request->is_active==1) {
            $Query->whereIsActive($request->is_active);
        }elseif($request->is_active==2){
            $Query->whereIsActive(0);
        }

        if($request->in_stock){
            $Query->whereInStock($request->in_stock);
        }
        if($request->featured){
            $Query->whereFeatured($request->featured);
        }
        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            // ->addColumn('category_id', function ($data) {
            //     return $data->Category ? $data->Category->name : '';
            // })
            ->addColumn('product_id', function ($data) {
                // return $data->ProductImageFirst ? $data->ProductImageFirst->image : '';
                if ($data->ProductImageFirst) {
                    $url = asset('storage/photo/'.$data->ProductImageFirst->image);
                } else {
                    $url = '';
                }

                return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image" class="img-fluid mx-auto d-block"/>';
            })
            ->addColumn('is_active', function ($data) {
                return $data->is_active == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('action', function ($data) {
                $html = '';
                $html .= '<button class="btn btn-info btn-sm" onclick="callDetail('.$data->id.')"><i class="fas fa-eye font-size-12"></i></button>
                    <a class="btn btn-primary btn-sm" href="'.route('product.product', ['id' => $data->id]).'" data-id="'.$data->id.'"><i class="bx bx-edit font-size-12"></i></a>';
                if (!$data->OrderDetail && !$data->AddToCard) {
                    $html .= '<button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-12"></i></button>';
                }

                return $html;
            })
            ->rawColumns(['category_id', 'image', 'product_id', 'is_active', 'action'])
            ->toJSON();
    }
    public function SubSubCategoryTable()
    {
        $Query = SubSubCategory::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('is_active', function ($data) {
                return $data->is_active == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('sub_category_id', function ($data) {
                return $data->SubCategory ? $data->SubCategory->name : '';
            })
            ->addColumn('image', function ($data) {
                $url = asset('storage/photo/'.$data->image);

                return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image" class="img-fluid mx-auto d-block"/>';
            })
            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['sub_category_id', 'image', 'is_active', 'action'])
            ->toJSON();
    }
    public function SubCategoryTable()
    {
        $Query = SubCategory::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('is_active', function ($data) {
                return $data->is_active == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('category_id', function ($data) {
                return $data->Category ? $data->Category->name : '';
            })
            ->addColumn('image', function ($data) {
                $url = asset('storage/photo/'.$data->image);

                return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image" class="img-fluid mx-auto d-block"/>';
            })
            ->addColumn('action', function ($data) {
                return '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';
            })
            ->rawColumns(['category_id', 'image', 'is_active', 'action'])
            ->toJSON();
    }
    public function CategoryTable()
    {
        $Query = Category::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('is_active', function ($data) {
                return $data->is_active == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('image1', function ($data) {
                $url = asset('storage/photo/'.$data->image1);

                return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image1" class="img-fluid mx-auto d-block"/>';
            })
            ->addColumn('image2', function ($data) {
                $url = asset('storage/photo/'.$data->image2);

                return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image2" class="img-fluid mx-auto d-block"/>';
            })
            ->addColumn('action', function ($data) {
                $html = '';
                $html .= '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>';
                $html .= '<button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';

                return $html;
            })
            ->rawColumns(['image1', 'image2', 'is_active', 'action'])
            ->toJSON();
    }
    public function BrandTable()
    {
        $Query = Brand::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('image', function ($data) {
                $url = asset('storage/photo/'.$data->image);

                return '<img src="'.$url.'" style="height:92px; weight:138px;" alt="Image" class="img-fluid mx-auto d-block"/>';
            })
            ->addColumn('action', function ($data) {
                $html = '';
                $html .= '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>';
                $html .= '<button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';

                return $html;
            })
            ->rawColumns(['image', 'action'])
            ->toJSON();
    }
    public function UnitTable()
    {
        $Query = Unit::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('action', function ($data) {
                $html = '';
                $html .= '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>';
                $html .= '<button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';

                return $html;
            })
            ->rawColumns(['action'])
            ->toJSON();
    }
    public function WarehouseTable()
    {
        $Query = Warehouse::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            // ->addColumn('branch_id', function ($data) {
            //     return $data->Branch ? $data->Branch->name : '';
            // })
            ->addColumn('action', function ($data) {
                $html = '';
                $html .= '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>';
                $html .= '<button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';

                return $html;
            })
            ->rawColumns(['action', 'branch_id'])
            ->toJSON();
    }
    public function VatTable()
    {
        $Query = Vat::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('is_active', function ($data) {
                return $data->is_active == 1 ? 'Active' : 'Inactive';
            })

            ->addColumn('action', function ($data) {
                $html = '';
                $html .= '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>';
                $html .= '<button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';

                return $html;
            })
            ->rawColumns(['image', 'is_active', 'action'])
            ->toJSON();
    }
    public function CurrencyTable()
    {
        $Query = Currency::query()->orderBy('id', 'desc');

        $this->i = 1;

        return Datatables::of($Query)
            ->addColumn('id', function ($data) {
                return $this->i++;
            })
            ->addColumn('is_active', function ($data) {
                return $data->is_active == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('action', function ($data) {
                // if (Auth::User()->can('edit warehouse')) {
                $html = '';
                $html .= '<button class="btn btn-primary btn-sm" onclick="callEdit('.$data->id.')"><i class="bx bx-edit font-size-18"></i></button>';
                $html .= '<button class="btn btn-danger btn-sm" onclick="callDelete('.$data->id.')"><i class="bx bx-window-close font-size-18"></i></button>';

                return $html;
            })
            ->rawColumns(['is_active', 'action'])
            ->toJSON();
    }
}
