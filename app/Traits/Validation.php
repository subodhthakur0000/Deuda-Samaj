<?php
namespace App\Traits;

use Illuminate\Http\Request;


trait Validation {

   public function galleryvalidation()
      {
        $data = Request()->validate([
                'title'     =>  'required|max:300',
                'image'    => 'required|image|mimes:jpg,JPG,JPEG,jpeg,png,GIF|max:2048',
                'imagedescription'  => 'required|max:300',
                'status'      => 'required',
            ]);
           return ($data);
      }

      public function contactdetailvalidation(){
        $data = Request()->validate([
            'email'     =>  'required|max:100',
            'phone'  => 'required|max:15',
            'address'  => 'required',

        ]);
       return ($data);
       }

        public function contactdetailupdatevalidation(){
        $data = Request()->validate([
            'email'     =>  'required|max:100',
            'phone'  => 'required|max:15',
            'address'  => 'required',

        ]);
       return ($data);
       }


     public function contactvalidation()
     {
       $data = Request()->validate([
            'name'    => 'required|max:100',
            'email'    => 'required|email',
            'message'  => 'required|max:3000',
            'status' => '',
        ]);
       return ($data);

      }

       public function replyvalidation()
        {
          $data = Request()->validate([
                  'email'    => 'required|email|max:100',
                  'subject'   => 'required|max:300',
                  'message'  => 'required|max:3000',
                  'status'  => 'required',
              ]);
             return ($data);
        }

       public function bannervalidation()
        {
          $data = Request()->validate([
                  'title'     =>  'required|max:100|unique:banners,title',
                  'description' => 'required|max:200',
                  'image'    => 'required|image|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
                  'imagedescription'  => 'required|max:200',
                  'facebook' => '',
                  'twitter' => '',
                  'linkedin' => '',
                  'youtube' => '',
                  'status'      => 'required',
              ]);
             return ($data);
        }

        public function bannerupdatevalidation()
        {
          $data = Request()->validate([
                  'title'     =>  'required|max:100',
                  'description' => 'required|max:200',
                  'image'    => 'image|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
                  'imagedescription'  => 'required|max:200',
                  'facebook' => '',
                  'twitter' => '',
                  'linkedin' => '',
                  'youtube' => '',
                  'status'      => '',
              ]);
             return ($data);
        }

        public function aboutvalidation(){
        $data = Request()->validate([
            'title'     =>  'required|unique:abouts,title|max:50',
            'summary'  => 'required|max:550',
            'description'  => 'required',
            'image'    => 'required|image|mimes:jpg,JPG,JPEG,jpeg,png,GIF|max:2048',
            'imagedescription'  => 'required|max:200',
            'status'  => 'required',

        ]);
       return ($data);
       }

       public function aboutupdatevalidation(){
        $data = Request()->validate([
            'title'     =>  'required|max:50',
            'summary'  => 'required|max:550',
            'description'  => 'required',
            'image'    => 'mimes:jpg,JPG,JPEG,jpeg,png,GIF|max:2048',
            'imagedescription'  => 'required|max:200',
            'status'  => 'required',

        ]);
       return ($data);
       }

  public function seovalidation()
  {
    $data = Request()->validate([
            'pagetitle'     =>  'required|unique:seos,pagetitle',
            'seotitle'    => 'required|max:60',
            'seokeyword'  => 'required|max:60',
            'seodescription'  => 'required',
        ]);
       return ($data);
  }

   public function seoupdatevalidation()
  {
    $data = Request()->validate([
            'pagetitle'     =>  'required',
            'seotitle'    => 'required|max:60',
            'seokeyword'  => 'required|max:60',
            'seodescription'  => 'required',
        ]);
       return ($data);
  }

 
  public function quickvalidation()
  {
    $data = Request()->validate([
            'emailto'    => 'required|email|max:100',
            'subject'   => 'required|max:200',
            'message'  => 'required',
        ]);
       return ($data);
  }


       
    
}