##### Kész végpontok

###### MINDEN KÉRÉSBE: 
    
    Header name: Accept
    
    Header value: application/json
    
##### Figyelem: a hibakezelés még nem teljes. Igyekezzetek csak olyan azonosítókat és relációkat használni, amelyekről tudjátok, hogy léteznek az adatbázisban!

1. Bejelentkezés

        URL: https://nyusz.eu/afpleva/public/api/login
        
        Method: POST
        
        Body Content Type: application/json
        
        Body Content: {"email": "arjunphp@gmail.com", "password": "Arjun@123"}
    
    Ha ezt kapod:
    
        {
        "error": true,
        "message": "These email credentials do not match our records."
        }
    
    Akkor a body content type a hibás, vagy elírtad az adatokat.
    
    Ha ezt:
    
        {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJlbWFpbCI6ImFyanVucGhwQGdtYWlsLmNvbSJ9.yXgY7LWB3_lHEkPB9pj5onGsNWk8norftkRdGesXMb8"
        }
    
    Akkor siker. A token tartalmát (a kettőspont utáni karakterlánc ékezetek nélkül) mentsd el, 
    ez kell majd a következő lekérdezéshez a Bearer után.
    
    
    
2. Bejelentkezett user adatainak lekérdezése

        URL: https://nyusz.eu/afpleva/public/sapi/user
        
        Method: GET
        
        Header 1 name: Content-Type
        
        Header 1 value: application/json
        
        Header 2 name: Authorization
        
        Header 2 value: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJlbWFpbCI6ImFyanVucGhwQGdtYWlsLmNvbSJ9.yXgY7LWB3_lHEkPB9pj5onGsNWk8norftkRdGesXMb8
        
    A hosszú karakterlánc egyedi, az előző pontban ezt kaptad vissza. Módosítsd a kérést e-szerint!
    
3. Regisztráció

        URL: https://nyusz.eu/afpleva/public/api/register
        
        Method: POST
        
        Body Content Type: application/json
    
    Body Content példa: 
    
        {
            "loginName": "loginName",
            "realName": "realName",
            "email": "valami@example.com",
            "password": "123456"
        }
    
    A sikeres regisztráció válasza ugyanaz mint a login esetében.
    
4. Topic

- Új

        URL: https://nyusz.eu/afpleva/public/sapi/topic
        
        Method: POST
        
        Body Content Type: application/json
    
    Body Content példa: 
    
        {"name": "topic name", "description": "topic desription"}
        
 - Módosít
 
        URL: https://nyusz.eu/afpleva/public/sapi/topic/1
        
        Method: PUT
        
        Body Content Type: application/json
    
    Body Content példa: 
    
        {"name": "topic name", "description": "topic desription"}
        
 - Lista
 
        URL: https://nyusz.eu/afpleva/public/sapi/topics
        
        Method: GET
        
 - Adott id 
 
        URL: https://nyusz.eu/afpleva/public/sapi/topic/1
        
        Method: GET
        
 - Törlés
 
        URL: https://nyusz.eu/afpleva/public/sapi/topic/1
        
        Method: DELETE
        
 4. Curriculum

- Új

        URL: https://nyusz.eu/afpleva/public/sapi/curriculum
        
        Method: POST
        
        Body Content Type: application/json
    
    Body Content példa: 
    
        {"title": "curriculum title", "content": "curriculum content", "topic": 2}
        
 - Lista
 
        URL: https://nyusz.eu/afpleva/public/sapi/curricula
        
        Method: GET
        
 - Lista topic ID-re szűrve
 
        URL: https://nyusz.eu/afpleva/public/sapi/curricula?topic=2
        
        Method: GET   
        
 - Adott id 
 
        URL: https://nyusz.eu/afpleva/public/sapi/curriculum/1
        
        Method: GET
        
  - Törlés
 
        URL: https://nyusz.eu/afpleva/public/sapi/curriculum/1
        
        Method: DELETE
        
  - Az update methodok idő híján egyelőre kimaradnak a további elemekből is. Addig is, ha módosítani szeretnétek: delete + post.
  
4. ExerciseDilemma

- Új

        URL: https://nyusz.eu/afpleva/public/sapi/exerciseDilemma
        
        Method: POST
        
        Body Content Type: application/json
    
    Body Content példa: 
    
        {"question": "Ez egy kérdés?", "yesNo": 1, "topic": 2}
        
 - Lista
 
        URL: https://nyusz.eu/afpleva/public/sapi/exerciseDilemmas
        
        Method: GET
        
 - Lista topic ID-re szűrve
 
        URL: https://nyusz.eu/afpleva/public/sapi/exerciseDilemmas?topic=2
        
        Method: GET
        
 - Lista feladatsor ID-re szűrve (folyamatban...)
 
        URL: https://nyusz.eu/afpleva/public/sapi/exerciseDilemmas?exerciseList=1
        
        Method: GET
        
 - Adott id 
 
        https://nyusz.eu/afpleva/public/sapi/exerciseDilemma/2
        
        Method: GET
        
  - Törlés
 
        URL: https://nyusz.eu/afpleva/public/sapi/exerciseDilemma/1
        
        Method: DELETE
