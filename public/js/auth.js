// Initialize Firebase Authentication
function initAuth() {
    firebase.auth().onAuthStateChanged(async function(user) {
        if (!user) {
            window.location.href = BASE_URL + '/login';
        } else {
            // Reference to Firestore
            const db = firebase.firestore();
            const userRef = db.collection('users').doc(user.uid);

            try {
                const doc = await userRef.get();
                if (!doc.exists) {
                    // Create new user document with default role (can be changed later)
                    await userRef.set({
                        email: user.email,
                        isEducator: false, // Change to true if you want all new users to be educators by default
                        isAdmin: false
                    });
                    console.log('User document created');
                } else {
                    console.log('User document exists');
                }
            } catch (error) {
                console.error('Error accessing Firestore user document:', error);
            }
        }
    });

    document.getElementById('signOutButton')?.addEventListener('click', function() {
        firebase.auth().signOut().then(() => {
            window.location.href = BASE_URL + '/login';
        }).catch((error) => {
            console.error('Sign out error:', error);
            alert('Error signing out');
        });
    });
}

// Call initAuth when document is ready
document.addEventListener('DOMContentLoaded', initAuth);
