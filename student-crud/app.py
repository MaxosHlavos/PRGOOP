from flask import Flask, render_template, request, redirect
import sqlite3

app = Flask(__name__)

def get_db():
    return sqlite3.connect("database.db")

@app.route("/")
def index():
    db = get_db()
    students = db.execute("SELECT * FROM student").fetchall()
    return render_template("index.html", students=students)

@app.route("/create", methods=["GET", "POST"])
def create():
    if request.method == "POST":
        db = get_db()
        db.execute(
            "INSERT INTO student (jmeno, prijmeni, email, obor) VALUES (?, ?, ?, ?)",
            (
                request.form["jmeno"],
                request.form["prijmeni"],
                request.form["email"],
                request.form["obor"],
            ),
        )
        db.commit()
        return redirect("/")
    return render_template("create.html")

@app.route("/edit/<int:id>", methods=["GET", "POST"])
def edit(id):
    db = get_db()

    if request.method == "POST":
        db.execute(
            "UPDATE student SET jmeno=?, prijmeni=?, email=?, obor=? WHERE id=?",
            (
                request.form["jmeno"],
                request.form["prijmeni"],
                request.form["email"],
                request.form["obor"],
                id,
            ),
        )
        db.commit()
        return redirect("/")

    student = db.execute("SELECT * FROM student WHERE id=?", (id,)).fetchone()
    return render_template("edit.html", student=student)

@app.route("/delete/<int:id>")
def delete(id):
    db = get_db()
    db.execute("DELETE FROM student WHERE id=?", (id,))
    db.commit()
    return redirect("/")

if __name__ == "__main__":
    app.run(debug=True)
