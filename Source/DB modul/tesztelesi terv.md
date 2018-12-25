# 	Tesztelési terv 

AFP-LEV-A Project

Dokumentum címe: Tesztelési leírás

Minősítés: jóváhagyott

Verziószám: 1.1

Projekt név: AFP-LEV-A DB modul

Készítette:	
		Madarász Zsolt
		Szobonya Gergő
		
Utolsó mentés kelte: 2018.12.25	

Dokumentum célja: Tesztelési terv leírása

Fájlnév:	tesztelesi terv.md


###	Változtatások jegyzéke
Verzió	Dátum	Készítette	Megjegyzés
1.0	2018.10.30 	Madarász Zsolt	 adatbázis model terv elkészítése
1.1	2018.11.18	Madarász Zsolt	Adatbázis modell módosítása a Backend elvárasi szerint
			
			
			

###	A dokumentumot megkapják
A megrendelő, Tajti Tibor, a Backend, Frontend csapat tagjai.



#	1	Bevezetés
Egy több táblából álló adatbázis létrehozása MySQL-ben. A kész adatbázist letesztelni megfelelő szempontok szerint, például adott változtípusok elfogadása. A kész adatbázist átadni az illetékes csoportoknak további tesztelés céljából.


##	1.1	Tesztelési terv hatóköre, célja 
A tesztelési terv az adatbázis felépítésére terjed ki. Annak megfelelő adattípus rögzítésére. Az élesteszteket a Backend és Frontend csdapat végzi az általuk megírt kóddal. Hiba esetén a válzotatásokat az Adatbázis részleg módosítja a megadott szempontok szerint.

##	1.2	Elvárások

A tesztelés alá vetett adatbázisunknak teljesíteni-e kellene a lentebb foglaltakat.
Az adott táblákban való helyes értékek való tárolása.
Hibás érték esetén figyelmeztett/nem fogadja el.
A táblák közötti kapcsolatok ellenörzése.
A helyes müködés megerősítése.
A táblák adat kapacitása. 

#	2	Szükséges erőforrások

Olyan programok, amely az adatbázisunkat random értékkel tölti meg és vizsgálja az helyesen megadott értékek elfogadását.
Teszt adatbázis szerver.
Random adatok.

##	2.1	Feladatkörök és felelősségek (tesztcsapat meghatározása)

Feladatkörök és felelősségek
Feladatkör	Felelősség/tevékenység	Személy
Tesztelő:		A teszt végrehajtása
	Észrevételek dokumentálása
	Teszt dokumentáció archiválása	
Szakértő:	A szakértő az észrevételek elemzi és megoldást javasol.	
Teszt-koordinátor:		Teszt terv készítése
	A tesztterv jóváhagyatása a projektmenedzserrel
	Teszt forgatókönyvek létrehozása
	Inkonzisztenciák kezelése 
	Helyes és időbeni hibakezelés 
	Szükség esetén problémák eszkalálása a projekt menedzsernek 
	Végső riport készítése
	Teszt dokumentum archiválása
	Az észrevételek státuszának követése, ill. dokumentálása	
Projektvezető:		Teszt terv jóváhagyása 
	Teszt forgatókönyv (testscript)	

##	2.2	Tesztkörnyezet
Az adatbázist MySQL Workbench-ben tervezzük meg, ezután a EER diagrammot átadjuk a Backend-csapatnak, amennyiben elfogadja létrehozzuk az adatbázist és elkezdjük annak tesztelését. Bármely probléma esetén javítjuk a hibákat és megint átadjuk elfogadásra, ezt addig ismételgetjük ,amíg szükséges.


Tesztkörnyezet
Környezet neve és feladata	A hozzáférés módja	Konfiguráció	Kapcsolattartó személyek
			
			
			
#	3	Tesztelési terv

A tesztünk egy az adatbázisba felvihető adatok helyességét, a kapcsolatok megfelelő müködését és az adatbázis kapacitását teszteli.
A tesztelés során keletkezett hibák feljegyzése és későbbiekben csoportosított csoportokban való elhelyezése a riport-ban.
A tesztelés során esetleges megfigyelések, észrevételek leírása.
A teszt elvárt eredményeit/sikerességének kritériumai a Tesztleiras.txt-ben található.

##	3.1	Fejlesztői teszt

A teszt az adatbázis alapvető funkcióit ellenőrzi.
Amelyek magába foglalják az adatok felvitele, adatok lekérdezése és törlése.
Ez a hozzá készített szerveroldali megvalósítással.
Az esetleges hibák feljegyzzése.
A backend oldalon lévő konfliktusok kiszürése.

##	3.2	Prototípus (modul) teszt

A prototípustesztelés (vagy másik nevén modultesztelés) célja a rendszer már működő moduljainak önálló tesztelése, a modulon belüli hibák azonosításának és kiküszöbölésének érdekében. Módszere:...

#	4	Tesztelési jegyzőkönyv és tesztelési jelentés
##	4.1	Tesztelési jegyzőkönyv
Az adatbázis modeljének elkészítése. A Backend nem fogadta el a tervet. Szükséges módosítások végrehajtása. Ezen módosítások dokumntálva a Trellón. A második logikai tervet a Backend elfogadta. Adatbázis létrehozása és feltöltése a tesztszerverre. Addattípusok ellenőrzése és dokumentálása.

##	4.2	Tesztelési jelentés

A tesztelési jelentést a tesztkoordinátor készíti el. Ez egy részletes áttekintése a lefutott teszteknek, azok eredményeinek, státuszának és a megjegyzéseknek.
A tesztkoordinátor juttatja el a projektmenedzsernek a tesztelési jelentést. 
##	4.3	Tesztelt elvárások 

Az alábbi funkcionális elvárások szerepelnek az üzleti illetve fejlesztői specifikációban, amelyek tesztelésre is kerültek: 

#	Leírás
1.	
2.	
3.	
4.	
5.	
6.	
7.	

Az alábbi nem-funkcionális elvárások szerepelnek az üzleti illetve fejlesztői specifikációban, amelyek tesztelésre is kerültek: 

#	Leírás
1.	
2.	
3.	
4.	

Az alábbi elvárások szerepelnek az üzleti illetve fejlesztői specifikációban, amelyek nem kerültek tesztelésre: 

##	4.4	Elfogadási kritériumok
A teszt sikerességének kritériumai: Az elvárások hiba mentes teljesítése.Csak adott adattípus elfogadása a tábla funkciójának megfelelően. Téves adat esetén hibaüzenet kiíratása.
	
##	4.5	Kockázat kezelés

#	Kockázat	Hatás
(magas/közepes/
alacsony)	A kockázat kezelésének módja
1.			
2.			
3.			

Tesztelési jelentés*




	Megfelelt/élesíthető
	Nem felelt meg
	Megfelelt megjegyzésekkel

