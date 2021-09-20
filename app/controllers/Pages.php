<?php
class Pages extends controller
{
    public function __construct()
    {
      
    }
    public function index()
    {
         $data=['title'=>'ayoub',
                 'description'=> "ghfdghf ghfhgd ghdgd fgdfgd dgfs fgdsgf dfgdd fgdfgd"
        ];

         $this->view('Pages/index',$data);
    }
    public function about()
    {
       
        $data=['title'=>'ayoub'];
        $this->view('Pages/about',$data);
    }
}