### A REST API hívásának a szabályai.

A projektben a Slim PHP által felállított REST API konvenciókat használjuk az útvonalak definiálására.
A szabályok betartásával pusztán az adatbázis szerkezet ismeretében ugyanazt az útvonalat definiálja bárki 
egy adott kérésre, nincs szükség funkciónkénti útvonal egyeztetésre.

Ehhez azonban először meg kell ismerni a kliens oldali lehetőségeket.

#### Android

[tutorial](https://www.londonappdeveloper.com/consuming-a-json-rest-api-in-android/). 

Ez sajnos csak a GET metódust fedi le, viszont az új projekt létrehozásától az indításig.
Itt egy másik leírás, ez csak az alkalmazás törzsével foglakozik, de azzal részletesebben.

[stackowerflow](https://stackoverflow.com/questions/29339565/calling-rest-api-from-an-android-app)

#### Web Frontend

[A Roland által felajánlott szerveren](http://burgervargyros.hu/src/client/public/sample.php) 
elhelyeztem példakódokat.

#### Általános szabályok

1. A body content type minden esetben legyen Application/Json! Vagyis ha post data-t(egy űrlapot) 
    küldtök be, akkor gondoskodjatok arról, hogy ez szabályos json formában érkezzen! 
2. A REST API címét tároljátok el egy beállítás fájlban, hogy szükség esetén csak egy helyen kelljen módosítani.
    A továbbiakban erre API_URL-ként fogok hivatkozni.
3. A bejelentkezést nem igénylő útvonalak kezdődjenek így: API_URL/api
4. A bejelentkezést igénylő útvonalak kezdődjelen így: API_URL/sapi
5. HTTP metódusok:
    1. Lekérdezés: GET
    2. Új rekord, login, regisztráció: POST
    3. Létező rekord módosítása: PUT
    4. Törlés: DELETE
    
    Hogy miképpen tudod megadni egy kérésnek a metódust, az implementáció függő. Mivel ezek szabványok, 
    minden platform kínál rá egyszerű megoldást. Ha órákba telik erre rájönni, akkor keress más eszközt!
    Ugyenez igaz a fejléc és a törzs adataira is.
6. Útvonal építés:
    - Az útvonalhoz add hozzá az **adatbázis adott táblájának a nevét kisbetűvel**!
    - Ha több rekordot kérdezel le, használj többes számot!
    - Ha egyetlen rekordot kérdezel le vagy módosítasz, használj egyes számot!
7. A további paramétereket ehhez fűzd hozzá!
8. Amelyik útvonal nem építhető fel ezen szabályok alapján (például több paraméter kell, 
    és ezek sorrendjét meg kell határozni), azzal kapcsolatban keresd a Backend csapatot!
    
    Példák:
    
    Felhasználók listája: GET http://API_URL/sapi/users
    
    A 6-os id-jű user adatai: GET http://API_URL/sapi/user/6
    
    A "Matematika" téma lekérdezése: GET http://API_URL/sapi/topic/Matematika
    
    Bejelentkezés: POST http://API_URL/api/login
        A kérés törzsébe: {"email": "example@email.com", "password": "szupertitkos" }
        
    Regisztráció: POST http://API_URL/api/registration
            A kérés törzsébe: 
                {
                    "loginName": "GipszJakab", 
                    "name": "Gipsz Jakab",
                    "email": "example@email.com", 
                    "password": "szupertitkos" 
                }
                
    A sikeres login kérésre válaszként ezt fogod kapni:
    
        {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJlbWFpbCI6ImFyanVucGhwQGdtYWlsLmNvbSJ9.yXgY7LWB3_lHEkPB9pj5onGsNWk8norftkRdGesXMb8"
        }
        
    Ha ezt kapod:
    
        {
        "error": true,
        "message": "These email credentials do not match our records."
        }
        
    Vagy hibás bejelentkezési adatokat küldtél, vagy nem szabványos Json-t csatoltál a kérés törzsébe.
    
    Bejelentkezés után a /sapi (bejelentkezést igénylő) kéréseidhez a headerbe csatold a tokent így:
    
    Header name: Authorization
    
    Header value: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJlbWFpbCI6ImFyanVucGhwQGdtYWlsLmNvbSJ9.yXgY7LWB3_lHEkPB9pj5onGsNWk8norftkRdGesXMb8
    
    A Bearer szót ne feledd beszúrni a token elé, majd egy szóköz, majd a login kérésre kapott token 
    tartalma idézőjel nélkül.
    
#### Válasz

A válasz siker esetén:

    {"status": "success", "code": CODE (pl: 200), "payload": AZ IGÉNYELT ERŐFORRÁS JSON FORMÁTUMBAN}
    
    Tehát, ha egy felhasználót kérdeztél le, akkor az adatait így éred el:
    
        response.payload
    
    Ha csak az email címére vagy kíváncs akkor:
    
        response.payload.email
    
A válasz hiba esetén:

    {"status": "failed", "code": ERROR_CODE, "message": HIBAÜZENET}    
    
#### Hibakeresés

Ha a fentieket betartva sem működnek a kérések, akkor az útvonal, a válasz és az esetleges hibaüzenet 
beszúrásával keressetek engem nyugodtan!
    
#### Javaslat 
Kezdjétek a regisztrációval, bejelentkezéssel és a témák létrehozásával listázásával. Mi is 
Így fogunk haladni. Az elkészült funkciók útvonalával folyamatosan bővítem ez a dokumentumot.
    
##### Happy Coding :)

##### Kész útvonalak

1. Bejelentkezés

    URL: http://nyusz.eu/public/api/login
    
    Method: POST
    
    Body Content Type: application/json
    
    Body Content: {"email": "arjunphp@gmail.com", "password": "Arjun@123"}
    
    Mivel még regisztráció nincs, csak ez fog működni!!!
    
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

    URL: http://nyusz.eu/public/sapi/user
    
    Method: GET
    
    Header 1 name: Content-Type
    
    Header 1 value: application/json
    
    Header 2 name: Authorization
    
    Header 2 value: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjIiLCJlbWFpbCI6ImFyanVucGhwQGdtYWlsLmNvbSJ9.yXgY7LWB3_lHEkPB9pj5onGsNWk8norftkRdGesXMb8
    
    A hosszú karakterlánc egyedi, az előző pontban ezt kaptad vissza. Módosítsd a kérést e-szerint!
    
3. Folyamatban: regisztráció


