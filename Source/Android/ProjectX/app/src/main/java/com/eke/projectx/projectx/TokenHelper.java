package com.eke.projectx.projectx;

public class TokenHelper {
    Payload payload;
    public static String LoginApiUrl = "https://nyusz.eu/afpleva/public/api/login";
    /*Json example:
*  {
     Method: POST
     Body Content Type: application/json
     Body Content: {"email": "arjunphp@gmail.com", "password": "Arjun@123"}
}*/
    public static String RegApiUrl = "https://nyusz.eu/afpleva/public/api/register";
    /*Json example:
      Method: POST
      Body Content Type: application/json
    *  {
    *
     "loginName": "loginName",
     "realName": "realName",
     "email": "valami@example.com",
     "password": "123456"
 }*/
    public static String UserInfoApiUrl = "https://nyusz.eu/afpleva/public/sapi/user";
        /*Json example:
    *  {
     Method: GET
     Header 1 name: Content-Type
     Header 1 value: application/json
     Header 2 name: Authorization
     Header 2 value: Bearer_ + Payload.token
 }*/

    public class Payload {
        Payload(String token){
            this.token = token;
        }
        String token;
        public String loginName;
        public String realName;
        public String email;
        public String password;
        public int id;
    }
}
