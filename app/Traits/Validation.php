<?php
namespace App\Traits;

use Illuminate\Http\Request;


trait Validation {
	public function noticevalidation(){
        $data = Request()->validate([
            'title'     =>  'required|unique:notices,title|max:1300',
            'category'    => 'required',
            'description'  => 'required',
            'noticedate' => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }
  public function noticeupdatevalidation(){
        $data = Request()->validate([
            'title'     =>  'required|max:1300',
            'category'    => 'required',
            'description'  => 'required',
            'noticedate' => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }

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

      public function careervalidation(){
        $data = Request()->validate([
            'title'     =>  'required|unique:careers,title|max:300',
            'description'  => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }

       public function careerupdatevalidation(){
        $data = Request()->validate([
            'title'     =>  'required|max:300',
            'description'  => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }

    public function testimonialsvalidation(){
        $data = Request()->validate([
            'name'     =>  'required|unique:testimonials,name|max:300',
            'description'  => 'required|max:2000',
            'status'  => 'required',

        ]);
       return ($data);
       }

       public function testimonialsupdatevalidation(){
        $data = Request()->validate([
            'name'     =>  'required|max:300',
            'description'  => 'required|max:2000',
            'status'  => 'required',

        ]);
       return ($data);
       }

     public function contactvalidation()
     {
       $data = Request()->validate([
            'name'    => 'required|max:100',
            'email'    => 'required|email',
            'mobilenumber' => 'required|max:15',
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

      public function blogvalidation(){
        $data = Request()->validate([
            'title'     =>  'required|unique:blogs,title|max:300',
            'summary'  => 'required|max:550',
            'description'  => 'required',
            'name'     =>  'required|unique:notices,title|max:100',
            'image'    => 'required|image|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
            'imagedescription'  => 'required|max:200',
            'seotitle'    => 'required|max:60',
            'seokeyword'  => 'required|max:60',
            'seodescription'  => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }

       public function blogupdatevalidation(){
        $data = Request()->validate([
            'title'     =>  'required|max:300',
            'summary'  => 'required|max:550',
            'description'  => 'required',
            'name'     =>  'required|unique:notices,title|max:100',
            'image'    => 'mimes:jpg,JPG,JPEG,jpeg,png,GIF|max:2048',
            'imagedescription'  => 'required|max:200',
            'seotitle'    => 'required|max:60',
            'seokeyword'  => 'required|max:60',
            'seodescription'  => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }

       public function messagevalidation(){
        $data = Request()->validate([
            'title'     =>  'required|unique:messages,title|max:300',
            'summary'  => 'required|max:800',
            'description'  => 'required',
            'image'    => 'required|image|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
            'imagedescription'  => 'required|max:300',
            'seotitle'    => 'required|max:60',
            'seokeyword'  => 'required|max:60',
            'seodescription'  => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }

       public function messageupdatevalidation(){
        $data = Request()->validate([
            'title'     =>  'required|max:300',
            'summary'  => 'required|max:800',
            'description'  => 'required',
            'image'    => 'mimes:jpg,JPG,JPEG,jpeg,png,GIF',
            'imagedescription'  => 'required|max:300',
            'seotitle'    => 'required|max:60',
            'seokeyword'  => 'required|max:60',
            'seodescription'  => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }

       public function bannervalidation()
        {
          $data = Request()->validate([
                  'title'     =>  'required|max:100',
                  'image'    => 'required|image|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
                  'imagedescription'  => 'required|max:200',
                  'status'      => 'required',
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

       public function goalvalidation(){
        $data = Request()->validate([
            'title'     =>  'required|unique:goals,title|max:100',
            'description'  => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }

       public function goalupdatevalidation(){
        $data = Request()->validate([
            'title'     =>  'required|max:100',
            'description'  => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }

       public function menuvalidation(){
        $data = Request()->validate([
            'title'     =>  'required|unique:menus,title|max:25',
            'description'  => 'required',
            'seotitle'    => 'required|max:60',
            'seokeyword'  => 'required|max:60',
            'seodescription'  => 'required',
            'status'  => 'required',

        ]);
       return ($data);
       }

       public function menuupdatevalidation(){
        $data = Request()->validate([
            'title'     =>  'required|max:25',
            'description'  => 'required',
            'seotitle'    => 'required|max:60',
            'seokeyword'  => 'required|max:60',
            'seodescription'  => 'required',
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