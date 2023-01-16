from flask import Flask, render_template, request, redirect, url_for
from flask.sessions import NullSession
from flask_sqlalchemy import SQLAlchemy
from datetime import datetime

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///main.db'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)

class Articles(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(50), unique=False, nullable=False)
    text = db.Column(db.Text, unique=False, nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow)

class Users(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    login = db.Column(db.String(20), unique=True, nullable=False)
    password = db.Column(db.String(20), unique=False, nullable=False)
    nickname = db.Column(db.String(20), unique=False, nullable=False)
    about = db.Column(db.String(300), unique=False, nullable=True)

class Coments(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    userID = db.Column(db.Integer)
    articleID = db.Column(db.Integer)
    text = db.Column(db.Text, unique=False, nullable=False)
    date = db.Column(db.DateTime, default=datetime.utcnow)

@app.route('/', methods=['POST', 'GET'])
@app.route('/<int:userID>', methods=['POST', 'GET'])
def mainPage(userID=0):
    user = Users.query.first()
    if request.method == "POST":
        login = request.form['login']
        password = request.form['password']
        if user.login == login and user.password == password:
            return redirect(f'/{user.id}')
        else:
            return redirect('/')
    else:
        return render_template('index.html')
    
if __name__ == "__main__":
    app.run(debug=True, use_reloader=False, host='0.0.0.0')