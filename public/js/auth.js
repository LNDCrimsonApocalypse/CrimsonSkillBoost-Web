// Initialize Firebase Authentication
function initAuth() {
    firebase.auth().onAuthStateChanged(function(user) {
        if (!user) {
            window.location.href = BASE_URL + '/login';
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
