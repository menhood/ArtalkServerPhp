<?php
namespace app\components;
use Lazer\Classes\Database as Lazer;

trait Table
{
  private function initTables()
  {
    // comments
    try{
      \Lazer\Classes\Helpers\Validate::table('comments')->exists();
    } catch(\Lazer\Classes\LazerException $e){
      Lazer::create('comments', [
        'id' => 'integer',
        'content' => 'string',
        'nick' => 'string',
        'email' => 'string',
        'link' => 'string',
        'ua' => 'string',
        'page_key' => 'string',
        'rid' => 'integer',
        'ip' => 'string',
        'date' => 'string',
      ]);
    }
    // captcha
    try {
      \Lazer\Classes\Helpers\Validate::table('captcha')->exists();
    } catch(\Lazer\Classes\LazerException $e){
      Lazer::create('captcha', [
        'ip' => 'string',
        'str' => 'string',
      ]);
    }
  }
  
  public static function getCommentsTable()
  {
    return Lazer::table('comments');
  }
  
  public static function getCaptchaTable()
  {
    return Lazer::table('captcha');
  }
}
