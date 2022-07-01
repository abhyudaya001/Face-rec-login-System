#!"C:\Users\PREDATOR\AppData\Local\Programs\Python\Python310\python.exe"
import cgi
from base64 import b64decode
import face_recognition
import mysql.connector
formData = cgi.FieldStorage()
face_match=0

image=formData.getvalue("current_image")
email=formData.getvalue("email")
data_uri = image
header, encoded = data_uri.split(",", 1)
data = b64decode(encoded)

with open("image.png", "wb") as f:
    f.write(data)
conn = mysql.connector.connect(user='root',password='',host='localhost',database='minip')
if conn:
    # print(email);
    query ="SELECT * FROM emp WHERE PID='"+email+"';"
    cursor = conn.cursor()
    cursor.execute(query)
    resultData = cursor.fetchall()
    cursor.execute("DELETE FROM session");
    cursor.execute("INSERT INTO session values('"+email+"');")
    conn.commit()
    if len(resultData) == 0:
        print("Content-Type: text/html")
        print()
        print('<script>')
        print('alert("Please ");')
        print("window.open('login.html','_parent');")
        print('</script>')
        
got_image = face_recognition.load_image_file("image.png")

existing_image = face_recognition.load_image_file("students/"+email+".jpg")

got_image_facialfeatures = face_recognition.face_encodings(got_image)[0]

existing_image_facialfeatures = face_recognition.face_encodings(existing_image)[0]

results= face_recognition.compare_faces([existing_image_facialfeatures],got_image_facialfeatures)

if(results[0]):
    face_match=1
else:
    face_match=0

print("Content-Type: text/html")
print()

if(face_match==1):
    print("<script>window.location.replace('welcome.php')</script>")
else:
    print("<script>alert('face not recognized')</script>")

# import subprocess

# def php(script_path):
#     p = subprocess.Popen(['php', script_path], stdout=subprocess.PIPE)
#     result = p.communicate()[0]
#     return result

# # YOUR CODE BELOW:
# page_html = "<h1>News and Updates</h1>"
# news_script_output = php("news-generator.php") 
# print page_html + news_script_output