<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function viewHome() {
        return view('site.static.home');
    }

    public function viewPage($page_id = null) {

        $data = array();

        if (!isset($page_id)):
            $page_id = 'home';
        endif;

        if ($page_id == 'contact') {
            //$contact = new \App\Contact();
            //array_push($data, 'contact');
        }

        return view('site.static.'.$page_id,compact($data));



        //$page = \App\Page::findOrFail($page_id);

        /*if ($page->cat_det_id_type == 'DYNPAG') :
            return view('site.dynamic.page',compact('page'));
        elseif ($page->cat_det_id_type == 'ESTPAG') :
            return view('site.static.'.$page->page_id,compact('page'));
        elseif ($page->cat_det_id_type == 'CUSPAG') :
            $data = array();
            array_push($data, 'page');
            if ($page->page_id == 'services') {
                $active_services = \App\Service::where('state','A')
                        ->orderBy('order','asc')
                        ->get();
                array_push($data, 'active_services');
            } elseif ($page->page_id == 'products') {
                $active_categories = \App\ProductCategory::where('state','A')
                        ->orderBy('name','asc')
                        ->get();
                array_push($data, 'active_categories');
            } elseif ($page->page_id == 'news') {
                $active_news = \App\Article::where('state','A')
                        ->orderBy('updated_at','asc')
                        ->get();
                array_push($data, 'active_news');
            } elseif ($page->page_id == 'contactus') {
                $contact = new \App\Contact();
                array_push($data, 'contact');
            }
            return view('site.custom.'.$page->page_id,compact($data));
        endif;

        return view('site.dynamic.page',compact('page'));*/
    }
}
