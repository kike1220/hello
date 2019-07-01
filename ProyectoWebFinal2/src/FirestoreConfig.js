import firebase from 'firebase/app';
import 'firebase/firestore';

firebase.initializeApp({
	apiKey: "AIzaSyBvgEhYN2f_mQQVTJNnpxQHEBq5Ktoqlbg",
    authDomain: "noticias-a3225.firebaseapp.com",
    projectId: "noticias-a3225",
})
let db = firebase.firestore();
export default db;