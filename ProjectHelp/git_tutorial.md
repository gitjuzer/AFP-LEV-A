## Git Segédlet

Ez a dokumentum a projekt elvégzéséhez szükséges minimális információt tartalmazza. Akik szeretnének elmélyedni a témában, azoknak ajánlom:

* GitHub Referencia [https://help.github.com/categories/github-pages-basics/](https://help.github.com/categories/github-pages-basics/)
* Pro Git Online Book - minden benne van [http://git-scm.com/book](http://git-scm.com/book)
* Git Real - ingyenes video kurzus [http://www.codeschool.com/courses/git-real](http://www.codeschool.com/courses/git-real)
* Git Branching - interaktív tananyag [http://pcottle.github.io/learnGitBranching/](http://pcottle.github.io/learnGitBranching/)

**FIGYELEM: A Branching** leírása az anyag végén található, mivel a feldolgozásához szükséges minden korábbi bekezdés. 
	Ennek ellenére se hagyd ki, mert erre épül a git munkafolyamat, amit projekt szinten szabályozni kell, hogy ne fulladjunk bele az egymást érő fájl-verzió-konfliktusokba!

### Mi is az a Git?

A Git egy verziókezelő, arra szolgál, hogy fájlok különböző verzióit kordában tartsa, elkönyvelje, tárolja és megossza. 
Röviden összefoglalva a Git annyit csinál, hogy amikor azt mondjuk neki (commit), akkor egy mappáról csinál magának egy helyi adatbázist a .git nevű könyvtárba. 

Ezekkel az adatbázisokkal

- nyomon tudja követni, hogy mikor hogyan változott a könyvtárunk,
- vissza tudja állítani bármelyik korábbi (commit-olt) állapotát a könyvtárnak,
- szinkronizálni tud egy másik gépen levő hasonló könyvtárral, közben intelligensen átvezeti a változásokat, illetve jelez, ha nem megy neki.

A szemléletbeli különbség ahhoz képest ahogy eddig éltünk az, hogy a dolgaink nem akkor vannak elmentve ha megnyomtuk az editorban a save gombot, 
hanem csak akkor, ha a git adatbázisunkba is bekerültek (commit). 

### Telepítés

Az OsX és Linux felhasználóktól elnézést kérek, de róluk azt feltételezem, hogy a gépükön már fent van a git.

Windows:

[Ezen az oldalon automatikusan elindul a git letöltése](https://git-scm.com/download/win)

A telepítés során hagyj mindent alapállapotban! A telepítés végeztével meg fog jelenni az asztalodon egy új ikon. Ez a GitBash konzol ikonja, ezt fogod használni a segédlet feldolgozása közben.

### Gyorstalpaló

A gyakorláshoz használhatod ezt a repót, korlátozás és szabályok nélkül: https://github.com/tcsk/afpleva-practice.git
Ha teljesen új számodra a verziókövetés és a git, akkor mindenképp gyakorolj egy kicsit a gyakorló (vagy egy tetszőleges) repón, mielőtt belekezdesz a projektbe!
Az első link alatt található parancsok értelmezése bőven elég az induláshoz.

- [Magyarul, kicsit elavult, de használható](http://math.bme.hu/~balazs/git/gitcml.html)
- [Angol, naprakész és bővebb](https://github.com/tcsk/practice-git/blob/master/README.md)


### Repók az AFP-LEV-A pro

Ha megvannak az alapok, akkor el is kezdhetjük a munkát. Fontos, hogy itt már ne kísérletezz, mert minden amit teszel, megjelenik majd a központi repóban is.

A GitBash parancssori eszköz indítása után navigálj egy mappába, ahová a projekt mappáját szeretnéd elhelyezni!
A példában ez a D meghajtó repos mappája, amit létre is hozunk. 

```bash
cd d:
mkdir repos
cd repos
``` 

Klónozhatod is a repót (az utolsó paraméter opcionális. Ha nem adod meg, a projekt eredeti neve lesz a mappa neve is: AFP-LEV-A):
A későbbiekben feltételezem, hogy használtad a paramétert.

```bash
git clone https://github.com/gitjuzer/AFP-LEV-A.git afpleva
``` 

Navigálj a repó mappájába, és kérdezd le a remote repository-k listáját!

```bash
cd afpleva
git remote -v
``` 

Az eredmény várhatóan:

origin  https://github.com/gitjuzer/AFP-LEV-A.git (fetch)
origin  https://github.com/gitjuzer/AFP-LEV-A.git (push)

Vagyis, a lokális repó távoli, origin elnevezésű remote-ja (ez a szabványos elnevezése a központi repónak, erre gyakran fognak hivatkozni publikációkban is) a 
https://github.com/gitjuzer/AFP-LEV-A.git útvonalon érhető el. A le és feltöltés útvonala lehet eltérő, emiatt kapjuk két sorba az eredményt.

A lokális adatbázis adatainak frissítése a távoli repó állapotára (a branch_name paramétert egy későbbi bekezdésben tárgyaljuk):

```bash
git fetch origin [branch_name]
``` 

A fetch használatát nem szükséges korlátozni, mivel soha nem fog belepiszkálni a fájlrendszerbe. Nagyon röviden (és sarkítva) annyit csinál, hogy naprakészen tartja 
a local és a remote közötti különbségek naplóját. Ha kíváncsi vagy arra, hogy a legutóbbi pull-od milyen változások keletkeztek a remote-on, akkor ezt a parancsot kell használnod!

A lokális adatbázis, és fájlrendszer frissítése a távoli repó állapotára:

```bash
git pull origin [branch_name]
``` 

Ez a parancs egyébként egyenértékű egy git fetch, majd egy git merge parancs egymás után való kiadásával. Akinek szimpatikusabb, használhatja a két parancsos verziót is.
Tehát a git először letölti a lokális adatbázisba a remote aktuális állapotát (fetch), majd ezt alkalmazza is a fájlrendszerre (merge).

[A git fetch és a git pull parancsok közötti különbség bővebben](https://www.git-tower.com/learn/git/faq/difference-between-git-fetch-git-pull)

A lokális módosításaid feltöltése a remote origin repóba:

```bash
git push origin [branch_name]
``` 

Push parancs előtt érdemes kiadni egy fetch/pull parancsot, mert ha a remote adatbázis frissebb mint a local, a git nem hajtja végre a push parancsot.
Egy másik dolog amit érdemes lekérdezni minden push előtt (minden fontosabb művelet előtt):

```bash
git status -s
```

Ha ezt a választ kapod: "nothing to commit, working tree clean", akkor nyugodtan push-olhatsz! Ha nem, akkor nem commit-olt módosításaid vannak. 
Egy listát kapsz arról, hogy mik a törölt, módosított és újonnan hozzáadott fájlok. Ezeket rögzíteni kell, mielőtt beküldöd a módosításokat a közösbe, 
amit e következő bekezdésben tárgyalunk

Kiegészítésként érdemes tudni, hogy a git remote add [repository path] paranccsal további remote-okat is hozzáadhatsz, de ezzel most nem foglalkozunk.

### Módosítások hozzáadása, rögzítése

A git két szempontból is megkülönbözteti a fájlok állapotát:

- A fájl adatbázishoz való viszonya (tracked, untracked és ignored)
- A tracked fájlok állapota az adatbázisban tárolt állapothoz képest (unmodified, modified, added, copied, renamed, deleted...)

Ha egy új repót hozol létre, abban minden fájl untracked-ként indul. Amíg nem adod hozzá a tracked fájlok listájához a git add paranccsal, addig a git figyelmen kívül hagy minden, 
a fájllal kapcsolatos módosítást. A git status parancs azonban ezeket a fájlokat is felsorolja, de a jelenlétük nem akadályozza meg sem a push-t sem a commit-ot. Ha 
azt szeretnéd elérni, hogy a git status sem vegyen róla tudomást, akkor a fájl elérési útját (vagy az őt tartalmazó mappáét, ha a teljes mappa tartalmát ignorálni szeretnéd)
hozzá kell adni a .gitignore fáj tartalmához. 

Az untracked fájlok használata kerülendő, használd helyettük az ignored opciót, hogy a status jelentésed mindig tiszta maradjon! A .gitignore fájl a projekt gyökér mappájában található.
Fontos tudni, hogy egy korábban már a tracked listához adott fájl elérési útjának a .gitignore fájlban való elhelyezése nincs semmilyen hatással az adatbázisra. Tehát ha egy tracked fájlt
ignorálni szeretnél, akkor azt először el kell távolítani a cache-ből: 

```bash
git rm --cached <file>
```

Az ignorált fájlok használatának komoly jelentősége van, szinte minden projektben szükséges a használatuk. Az egyik legjellemzőbb eset, amikor igényt tartunk rájuk, a lokális konfigurációs fájlok használata.
Ha fejlesztés részét képezi egy adatbázis, amihez tartozik felhasználónév és jelszó, akkor ez nyilván el fog térni az egyes fejlesztők munkaállomásain, a teszt és az éles szerveren is. Ezeket az adatokat
egy erre elkülönített fájlban tároljuk. Ha ezt nem tesszük láthatatlanná a git számára, akkor minden egyes push/pull alkalmával felülírnánk a cél repó adott állományait. Többek között erre szolgál a .gitignore.
Használatával minden repó fájlrendszerében van lehetőség egyedi fájlok használatára. Egy másik területet is megemlítenék: A legtöbb IDE (Visual Studio, Netbeans, Eclipse...) létrehoz egy 
saját mappát a projekt mappájában, amibe a lokális konfigurációs fájljait és a gyorsítótárat helyezi. A legtöbb esetben ezeknek is egyedinek kell lenniük, hogy a fejlesztés hibamentesen folyhasson.

Ezt a témát vedd komolyan, rengeteg bosszúságot okozhat egy akaratlanul átírt konfigurációs fájl! A .gitignore használatáról a fejlesztői környezet ismeretében kérdezd a csoportod vezetőjét!

A tracked fájlokról sokkal kevesebbet is elég mondani. A git status parancs minden módosított fájlról megmondja az állapotát. Amíg ilyen van, nem tudsz sikeresen commit-olni, push-olni.
Commit és push előtt tehát:

```bash
git status -s
```

Ha ezt a választ kapod: "nothing to commit, working tree clean", akkor nincs teendőd a commit előtt!
Ha nem, akkor az untracked fájlokról állapítsd meg, hogy szükséges-e közülük valamennyit ignorálni. Ha igen, akkor add hozzá a .gitignore fájlhoz az elérési útjukat!
Ezután egyetlen paranccsal hozzá tudod adni az összes új fájlt és módosítást a tracked listához, majd mehet a commit:

```bash
git add .
git commit -m "A commit rövid leírása"
```

[A fájlok állapotáról bővebben](https://codingbee.net/tutorials/git/git-file-states)

A fejlettebb git parancsok (módosítások visszavonása, egy bizonyos állapot visszaállítása, keresés a history-ban...) nem képezik részét ennek a segédletnek. 
A felsorolt linkek egyikén biztosan megtalálod, ha ennél többre vagy kíváncsi.

### Branching

A git rendszerében a branch-ek a fájlrendszer egy-egy diszkrét állapotát tárolják az adatbázisban. Amikor egy üres repóban létrehozod az első commit-ot, automatikusan
létrejön az első branch, melyet hagyományosan master-nek nevezünk. Ha a GitBash konzolban egy olyan könyvtárba navigálsz, ami egy git repót tartalmaz, akkor a parancssor végén, zárójelben 
láthatod az aktív branch nevét. Egy új ág létrehozásakor átmásolod annak az ágnak az állapotát az újba, amelyből létrehoztad, vagyis az új ág tartalma pontosan meg fog egyezni az eredetiével.

Ha ezután az új ágban módosítasz bármit, az az eredeti ágban nem fog látszani, amíg vissza nem másolod azt. Egy projekten belül bármennyi ágat, így bármennyi eltérő állapotot hozhatsz létre.

Mire is jó ez?

Tegyük fel, hogy munkaórák tucatjait ölted már egy fejlesztésbe, és elértél egy olyan állapotot, amit már mindenképp meg is szeretnél őrizni. Közben kapsz egy új feladatot, aminek a megvalósításával
kapcsolatban még vannak kérdések a fejedben. Ha ilyenkor a kész függvényeidet kezded el módosítgatni, és közben eljutsz egy pontra, ahol kiderül, hogy teljesen rossz irányba indultál el, akkor nagyon
nehéz lesz visszaállítani a kiinduló állapotot. Ehelyett te azt teszed, hogy a stabil állapotból leágaztatsz egy új ágat, és ott szabadon garázdálkodhatsz. Ha kiderül, hogy az irány zsákutca,
egyszerűen törlöd az ágat, visszatérsz a stabil állapothoz, és indítasz egy újat. Amikor viszont sikeresen lefejlesztetted az új feladatot, és minden jól működik, akkor az ág módosításait visszamásolhatod
a kiinduló ágba, ami megmarad a stabil állapotában, csak kiegészül az új fejlesztéssel.

Ezen kívül még bőven akad előnye az ágak használatának, csak a fantáziád szabhat határt annak, hogy miképpen tudod kihasználni azt a lehetőséget, hogy a fájlrendszeredet tetszőleges számú 
eltérő állapotban tarthatod, és hogy ezek között pillanatok alatt tudsz váltani.

Ágak a gyakorlatban:

A projekt klónozásakor két ágat is kapsz: master és develop. Ennek a két ágnak az élettartama megegyezik a projektével, vagyis ezeket soha nem töröljük. 
A master ág a stabil állapotot hivatott tárolni. Esetünkben ez a végleges állapot lesz, hiszen nem tervezünk kiadni több verziót. Ebből következik, hogy a **master ágban nem fejlesztünk**.
A klónozás után azonnal válts át a develop ágra, és a későbbiekben csak ezt, illetve az ebből leágaztatott ágakat használd. Lokális környezetben a fejlesztés végéig nem kell visszatérned a master ágba.
Arra figyelj, hogy ha munkaállomást váltasz, és újra leklónozod az origint, akkor automatikusan a master ágba kerülsz, ilyenkor ne feledd a váltást!

Az ágak váltása előtt mindig ellenőrizd a git státuszát (a git status parancsot nem lehet elég gyakran kiadni. Inkább használd indokolatlanul sokszor, minthogy egyszer is kihagyd, amikor fontos lenne).
Alacsonyabb rangú ágból soha ne válts vissza a szülő ágba úgy, hogy a git status eredménye nem üres! Ilyenkor a módosítások hozzáadása, rögzítése bekezdésben leírtak szerint járj el!

Váltás a develop ágra:

```bash
git checkout develop
```

Ezzel sajnos még nincs vége. Az egyes funkciók fejlesztését is érdemes elkülönített ágakban végezni. 
Csökkenti a konfliktusok kialakulásának a lehetőségét, és a git history is jóval egységesebb, átláthatóbb lesz.

Tegyük fel, hogy a fejlesztendő funkció a web frontend html5 csontváz létrehozása. Ekkor:

```bash
git checkout -b feature/frontend_html5_skeleton develop
```

A checkout parancs szolgál az ágak közötti váltásra. A -b paraméter jelzi, hogy új ágról van szó, tehát létre kell hozni. A -b paramétert követő sztring lesz az ág neve.
Konvenció szerint a feature ágakat "feature/ag_neve" formában kell megadni. Az utolsó paraméter pedig a kiinduló ág. Ha nem adod meg az utolsó paramétert, akkor az aktív ágat 
fogja másolni a rendszer. Eleinte azonban azt javaslom, hogy ne hagyj el paramétereket, úgy nem lehet hibázni. A feature ágak elnevezési konvenciót fontos következetesen betartani,
hogy a historyban azonnal felismerhető legyen!

Miután befejezted a funkció fejlesztését, visszamásolhatod a módosításokat a develop-ba, törölheted az ágat és mehet a push:

```bash
git status -s
git add .
git commit -m "Html5 skeleton"
```

Sikeres commit és üres status esetén:

```bash
git checkout develop
git merge --no-ff feature/frontend_html5_skeleton
git branch -d feature/frontend_html5_skeleton
$ git push origin develop
```

Tehát váltasz a develop ágba, ebbe belemásolod a feature branch módosításait, eltávolítod a feature branch-et (a commit-jaid megmaradnak, csak immár a develop ágban), aztán mehet a push.
Ebben az esetben is igaz, hogy push előtt szükség lehet pull-ra is.

A  git merge --no-ff parancs az ág módosításainak a másolását intézi olyan módon, hogy közben mindenképp létrehoz egy commitot is a git (--no-ff). Ez a history miatt szükséges.

A push parancsnál figyeld meg, hogy az origin paraméter után még explicit módon megadtuk az ágat is. Ha így adod ki a parancsot, akkor nem fogsz véletlenül keresztbe pusholgatni az ágak között.
A biztonság érdekében ne spórolj az ágak explicit megadásán!

Ezután elkezdheted a következő feladatot, amihez újra létrehozol egy feature branch-ez a developból, fejlesztesz, commitolsz, váltasz, mergelsz és pusholsz.


### Upstream fogalma

Ezt ugyan mi nem fogjuk használni, de gyakran megjelenik a leírásokban, ezért ejtek róla néhány szót, hogy ne kerülj képzavarba, amikor találkozol vele. 
Amennyiben egyáltalán nem foglalkoztat a téma, nyugodtan hagyd ki a bekezdést, a referenciaanyagokban pedig hagyd figyelmen kívül az upstream-mel kapcsolatos bejegyzéseket!

Az Open Source Development világában gyakori, hogy több százan, vagy akár ezren is dolgoznak egy projekten. Mivel ebben az esetben minden fejlesztő független, nem pedig egy jól szervezett cég alkalmazottja, 
fennáll a veszélye, hogy nem megfelelő minőségű, vagy akár nagyobb kárt okozó módosításokat is eszközölhet.

Erre azt a megoldást találták ki, hogy minden fejlesztő a saját repójában dolgozik, az eredeti projekthez csak a tulajdonos és az általa meghívott fejlesztők férnek hozzá. 
Amikor egy fejlesztős publikálásra késznek érzi a módosításait, ezt egy úgynevezett pull request formájában jelzi a projekt tulajdonosa felé, aki, ha megfelelőnek tartja a munkáját, 
be is húzza a módosításokat az eredeti projektbe. 

Így az eredeti projekt módosításai továbbra is ellenőrzött formában zajlanak, míg a fejlesztők a saját lokális és távoli repójukban korlátozások nélkül dolgozhatnak.

Amikor fejlesztő elkezdi a munkát, lemásolja az eredeti repót (ezt nevezik Fork-nak), majd ezt klónozza a lokális környezetébe.

Ekkor három állomáson is jelen van a projekt:

- Local: A fejlesztő helyi környezete
- Origin: A fejlesztő távoli környezete, amit az eredeti repóból fork-olt.
- Upstream: Ez pedig az eredeti projekt.






