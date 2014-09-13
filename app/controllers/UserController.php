<?php

class UserController extends BaseController {

  // gets the view for the register page
  public function getCreate(){

    return View::make('user.register');
  }

  public function getLogin(){
     return "Login Page";

  }
  public function postCreate(){
    $validate = Validator::make(Input::all(), array(
      'username' => 'required|unique:users|min:4',
      'pass1' => 'required|min:6',
      'pass2' => 'required|same:pass1'
    ));

    if($validate ->fails()){
      return Redirect::route('getCreate')->withErrors($validate)->withInput();
    }
    else{
      $user = new User();
      $user->username = Input::get('username');
      $user->password = Hash::make(Input::get('pass1'));

      if($user->save()){
        return Redirect::route('home')->with('success','شما موفقانه اکونت خویش را ایجاد نمودید حالا میتوانید داخل سیستم شوید!');
      }
      else{
        return Redirect::route('home')->with('fail','آه! مشکلی رخ داد شما در سیستم راجستر نشدید دوباره کوشش نمایید!');
      }
    }

  }
  public function postLogin(){

  }

  public function getLogout(){
    Auth:logout();
    return Redirect::route('home');
  }
}
