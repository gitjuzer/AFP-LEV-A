# X Projekt - projekt mankó
 
Projekt indító szakasz
----------------------
  
0. **Projekt megvalósítás menete**
	- *Cél*
A megvalósítás menetének folyamatos dokumentálása, dokumentumok rendszerezése.
	- *Elvárt eredmény*: 
A projekt aktuális állapotának rendszerezett dokumentumgyüjteménye, ami a kivitelezés során elkészült. Fontos ezen dokumentum gyűjtemény biztonságos megőrzése, akkor is ha a projekt felfüggesztésre vagy leállításra kerül.			

Igény felmérés szakasz
----------------------		

1. **Követelmény specifikáció**
- 1.1 **Igénylista** 
Ügyfél részéről felmerülő igény dokumentálása. 
	- *Cél*
Az ügyfél részéről felmerült igények dokumentuma, melyet a megrendelő és a leendő kivitelező nyilatkozatban fogadnak el. Ez képezi a leendő kivitelező által készítendő rendszerspecifikáció alapját.
	- *Elvárt eredmény*
Lezárt, véglegesített nyilatkozatban elfogadott igénylista dokumentum.
- 1.2 **Rendszer specifikáció**
A kivitelező által készített rendszer specifikáció, melyet az ügyfélnek bemutatott és az ügyfél nyilatkozatban elfogadott. E dokumentáció képezi az alapját az elkészítendő rendszertervnek.
	- *Cél*
A rendszer specifikációjának elkészítése és az ügyfélnek bemutatható prototípus elkészítése.
	- *Elvárt eredmény*
Az ügyfél által nyilatkozatban elfogadott rendszerspecifikáció dokumentum, bemutatható prototípus.

2. **Szerződés** 
Az ügyfél és a kivitelező között létrejött szerződés, melyben az ügyfél a leendő kivitelezőt felkéri a rendszer megtervezésére, melyet a leendő kivitelező a megfelelő ellenérték fejében elvállal.
	- *Cél*
A szerződés megkötése.
	- *Elvárt eredmény*
A szerződés dokumentuma.
 
Tervezési szakasz
-----------------
 
3. **Rendszerterv**
Ügyfél részére bemutatható a rendszerterv, ami a kivitelezés alapja.
	- *Cél*
Idő és költségbecslésekre valamint kivitelezés megvalósítására alkalmas rendszerterv.
	- *Elvárt eredmény*
Kivitelező által készített és ügyfél által nyilatkozatban jóváhagyott rendszerterv.
- 3.1 **Kivitelezés megrendeléséről szóló szerződés**
	- *Cél*
A szerződés megkötése.
	- *Elvárt eredmény*
A szerződés dokumentuma.
 
Kivitelezési szakasz
--------------------
 
4. **Kivitelezés**
- 4.0 - Fejelsztéshez szükséges hardver és szoftver környezet kiépítése (beszerzés, telepítés stb)
- 4.1 - Források és egyéb erőforrás fájlok a git-re feltéve 
	- 4.1.1 - kód teszt - (csak tesztelt, működő forrást teszünk fel a git-re).
- 4.2 - Modulok összeállítása.
	- 4.2.1 - modultesztek.
- 4.3 - Rendszer tesztkörnyezet létrehozása.
	- 4.3.1 - Fejlesztési szakasz lezárása. Minden modult le kell zárni sikeres tesztel, hogy a rendszer tesztelési 
				szakaszba át lehessen lépni. Lezáratlan modulok megakadályozzák a továbblépést és jelentős 
				költségnövekedéssel járnak, mert a többi fejlesztőt akkor át kell csoportosítani!!!
	- 4.3.2 - Rendszer telepítése csak a kivitelező által elérhető helyre.
	- *Cél* 
A rendszer szoftverkomponenseinek előállítása, beszerzése, a rendszer telepítése.
	- *Eredmény*
Tesztelhető rendszer.
 
Rendszer tesztelési szakasz
---------------------------
 
5. **Tesztelés**
- 5.1 - másodlagos kód teszt.	
- 5.2 - másodlagos modult teszt.
- 5.3 - rendszerteszt
	- 5.3.1 - funkcionális teszt - a rendszer felületen a rendszer által biztosított funkciók tesztelése.
	- 5.3.2 - dizájn teszt
	- 5.3.3 - stressz teszt (azoknak akik idegesek :) - ez szinte mindig terheléstesztet jelent.
	- *Cél*
Az összeállított rendszer minden komponensének úratesztelése és a teljes rendszer tesztelése.
	- *Elvárt eredmény*
Letesztelt üzemkész rendszer, vagy dokumentált hibalista.
  
Javítási szakasz
----------------
	
6. Ha szükség van rá, akkor a dokumentált hibalista alapján el kell dönteni, hogy mit kell javítani és mit az ami ismert hibaként a rendszerben maradhat. Ez után vissza kell lépni az 5. pontra és addig kell ezt folytatni amíg a letesztelt üzemkésznek nyílvánított rendszer elő nem áll.

Ilyenek nekünk már nem lesznek szerintem, ezért ezeket már nem másoltam be, ha szükség lesz rá, akkor ide is bemásolom a tudnivalókat.

Átadási/Beüzemelési szakasz
---------------------------

Üzemeltetési szakasz
--------------------
ha szükséges, de ez mindig új szerződés tárgya
