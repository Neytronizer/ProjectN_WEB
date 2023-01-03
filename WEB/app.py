from enum import unique
from os import name
from flask import Flask, render_template, request, redirect, url_for
from flask.sessions import NullSession
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///main.db'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)

class Articles(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    title = db.Column(db.String(50), unique=False, nullable=False)
    text = db.Column(db.Text, unique=False, nullable=False)

class Users(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    login = db.Column(db.String(20), unique=True, nullable=False)
    password = db.Column(db.String(20), unique=False, nullable=False)
    nickname = db.Column(db.String(20), unique=False, nullable=False)

class Coments(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    userID = db.Column(db.Integer)
    articleID = db.Column(db.Integer)

    def __repr__(self):
        return '<User %r>' % self.username


# @app.route('/', methods=['POST', 'GET'])
# @app.route('/<string:lang>', methods=['POST', 'GET'])
# def mainPage(lang="langEn"):
#     admin = Users.query.first()
#     if request.method == "POST":
#         user = request.form['user']
#         password = request.form['password']
#         if admin.username == user and admin.password == password:
#             return redirect('/admin_panel')
#         else:
#             return redirect('/')
#     else:
#         if Cruises.query.first() != None:
#             offers = Cruises.query.all()
#             if(lang == "langEn"):
#                 print("En")
#                 return render_template('main_page.html', offers=offers)
#             elif(lang == "langLv"):
#                 print("Lv")
#                 return render_template('main_page_lv.html', offers=offers)
#             else:
#                 print("Ru")
#                 return render_template('main_page_ru.html', offers=offers)
#         else:
#             if(lang == "langEn"):
#                 print("En")
#                 return render_template('main_page.html')
#             elif(lang == "langLv"):
#                 print("Lv")
#                 return render_template('main_page_lv.html')
#             else:
#                 print("Ru")
#                 return render_template('main_page_ru.html')

# @app.route('/admin_panel', methods=['POST', 'GET'])
# def adminPanel():
#     if request.method == "POST":
#         if request.form['selectType'] == "Port":
#             portName = request.form['portName']

#             port = Ports(name=portName)
#             try:
#                 db.session.add(port)
#                 db.session.commit()
#                 return redirect('/admin_panel')
#             except:
#                 return "ошибка"
#         elif request.form['selectType'] == "Ship":
#             ship = request.form['shipText']
#             passengerCapacity = request.form['shipCapacity']

#             ships = Ships(ship=ship, passengerCapacity=passengerCapacity)
#             try:
#                 db.session.add(ships)
#                 db.session.commit()
#                 return redirect('/admin_panel')
#             except:
#                 return "ошибка"
#         elif request.form['selectType'] == "Cruise":
#             ship = request.form['shipSelect']
#             fromPort = request.form['from']
#             toPort = request.form['to']
#             departDate = request.form['departDate']
#             price = request.form['price']

#             cruise = Cruises(ship=ship, departDate=departDate, floatsFrom=fromPort, floatsTo=toPort, price=price)
#             try:
#                 db.session.add(cruise)
#                 db.session.commit()
#                 return redirect('/admin_panel')
#             except:
#                 return "ошибка"
#     else:
#         if Cruises.query.first() != None:
#             offers = Cruises.query.all()
#             ships = Ships.query.all()
#             ports = Ports.query.all()
#             return render_template('admin_panel.html', offers=offers, ships=ships, ports=ports)
#         else:
#             return render_template('admin_panel.html')

# @app.route('/admin_panel_<string:type>_<int:id>', methods=['POST', 'GET'])
# def admin_panel_delete(type, id):
#             if type == "port":
#                 port = Ports.query.get_or_404(id)
#                 try:
#                     db.session.delete(port)
#                     db.session.commit()
#                     return redirect('/admin_panel')
#                 except:
#                     return "error"
#             if type == "ship":
#                 ship = Ships.query.get_or_404(id)
#                 try:
#                     db.session.delete(ship)
#                     db.session.commit()
#                     return redirect('/admin_panel')
#                 except:
#                     return "error"
#             if type == "cruise":
#                 cruise = Cruises.query.get_or_404(id)
#                 try:
#                     db.session.delete(cruise)
#                     db.session.commit()
#                     return redirect('/admin_panel')
#                 except:
#                     return "error"
    
# if __name__ == "__main__":
#     app.run(debug=True, use_reloader=False, host='0.0.0.0')