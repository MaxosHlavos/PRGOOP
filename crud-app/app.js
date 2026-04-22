const express = require("express");
const sqlite3 = require("sqlite3").verbose();
const bodyParser = require("body-parser");

const app = express();
const PORT = 3000;


app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static("public"));

const db = new sqlite3.Database("database.db");


db.run(`
CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    price REAL NOT NULL
)
`);


app.get("/", (req, res) => {
    db.all("SELECT * FROM products", [], (err, rows) => {
        if (err) return console.log(err);
        res.render("index", { products: rows });
    });
});


app.get("/create", (req, res) => {
    res.render("create");
});


app.post("/create", (req, res) => {
    const { name, price } = req.body;

    db.run(
        "INSERT INTO products (name, price) VALUES (?, ?)",
        [name, price],
        (err) => {
            if (err) return console.log(err);
            res.redirect("/");
        }
    );
});


app.get("/delete/:id", (req, res) => {
    db.run("DELETE FROM products WHERE id = ?", [req.params.id], (err) => {
        if (err) return console.log(err);
        res.redirect("/");
    });
});


app.get("/edit/:id", (req, res) => {
    db.get("SELECT * FROM products WHERE id = ?", [req.params.id], (err, row) => {
        if (err) return console.log(err);
        res.render("edit", { product: row });
    });
});


app.post("/edit/:id", (req, res) => {
    const { name, price } = req.body;

    db.run(
        "UPDATE products SET name = ?, price = ? WHERE id = ?",
        [name, price, req.params.id],
        (err) => {
            if (err) return console.log(err);
            res.redirect("/");
        }
    );
});


app.listen(PORT, () => {
    console.log(`Server běží na http://localhost:${PORT}`);
});