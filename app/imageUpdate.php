<?php


namespace Devzone\Roy\Pioneer;

trait ImageUpload
{
   /**
    * Iamage upload
    */

   protected function upload(array $file, $path = 'media/', $ext = ['jpg', 'jpeg', 'png', 'gif'])
   {
      //get file name
      $file_name = $file['name'];
      $file_tmp_name = $file['tmp_name'];


      //get file extention
      $file_arr = explode('.', $file_name);
      $file_ext = strtolower(end($file_arr));

      //file name uniqe
      $uniq_filename =  time() . '_' . rand(1000000, 121000000) . '_' .  str_shuffle('123456789') . '.' . $file_ext;

      //dir check
      if (!is_dir($path)) {
         mkdir($path);
      };

      //ext check
      if(!in_array($file_ext, $ext)){
         echo "Invalid file format";
         return;
      }

      //upload file
      move_uploaded_file($file_tmp_name, $path . $uniq_filename);

      return $uniq_filename;
   }
}
