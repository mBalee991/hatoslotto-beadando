## Hatoslottó alkalmazás

Laravel alapú webalkalmazás, amely a hatoslottó húzások adatait és nyereményeit kezeli. A rendszer:
- diagramon jeleníti meg az évenkénti nyereményösszegeket,
- admin felületen CRUD műveleteket kínál a húzásokhoz és áttekintést ad az üzenetekről,
- kapcsolat oldalon üzenetküldést biztosít bejelentkezett felhasználóknak,
- üzenetlista nézetet ad, ahol az admin minden üzenetet lát, a felhasználók pedig a sajátjaikat.

## Telepítés és futtatás

1. **Függőségek telepítése (PHP):** `composer install`
2. **Konfiguráció:** másold az `.env.example` fájlt `.env` néven, majd állítsd be az adatbázist és futtasd `php artisan key:generate` parancsot.
3. **Migrációk és seedelés:** `php artisan migrate --seed` (a seed feltölti a húzás/nyeremény adatokat a `storage/app` mappában lévő fájlokból, valamint létrehozza az alap admin felhasználót: `admin@teszt.hu / admin123`).
4. **Front-end függőségek:** `npm install`
5. **Assets buildelése:** `npm run build` (fejlesztéshez használható a `npm run dev`).
6. **Fejlesztői szerver indítása:** `php artisan serve` (alapértelmezetten http://127.0.0.1:8000 ).

## Fő útvonalak és jogosultságok

| Útvonal | Leírás | Jogosultság |
| --- | --- | --- |
| `/` | Nyitóoldal. | Publikus |
| `/diagram` | Évenkénti nyereményösszeg diagram. | Bejelentkezett felhasználó |
| `/messages` | Üzenetek listája (admin: minden, user: saját). | Bejelentkezett felhasználó |
| `/contact` (GET/POST) | Kapcsolat űrlap és üzenetküldés. | Bejelentkezett felhasználó |
| `/admin` | Admin dashboard statisztikákkal és legfrissebb üzenetekkel. | Admin |
| `/huzasok` + REST (create, store, edit, update, destroy) | Hatoslottó húzások CRUD. | Admin |
| `/login`, `/register`, stb. | Laravel Breeze autentikációs útvonalak. | Publikus (bejelentkezéshez) |
