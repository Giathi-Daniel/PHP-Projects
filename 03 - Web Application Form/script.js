const showError = (elementId, message) => {
    const errorElement = document.getElementById(elementId);
    errorElement.textContent = message;
    errorElement.style.display = 'block';
    setTimeout(() => {
        errorElement.style.display = 'none';
    }, 3000);
};

const formValidation = () => {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const feedback = document.getElementById('feedback').value;
    const rating = document.getElementById('rating').value;

    let isValid = true;

    if (!name) {
        showError('nameError', 'Name is required');
        isValid = false;
    }

    if (!email) {
        showError('emailError', 'Email is required');
        isValid = false;
    } else {
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            showError('emailError', 'Please enter a valid email address');
            isValid = false;
        }
    }

    if (!feedback) {
        showError('feedbackError', 'Feedback is required');
        isValid = false;
    }

    if (!rating || rating < 1 || rating > 5) {
        showError('ratingError', 'Please select a rating from 1 - 5');
        isValid = false;
    }

    return isValid;
};

document.getElementById('feedbackForm').addEventListener('submit', function (event) {
    event.preventDefault();
    
    if (!formValidation()) {
        return;
    }

    const formData = new FormData(this);

    fetch('submit_feedback.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Display success popup
            document.getElementById('popup').style.display = 'block';
            // Redirect to view_feedback.php after 2 seconds or on button click
            document.getElementById('viewFeedbackBtn').addEventListener('click', () => {
                window.location.href = 'view_feedback.php';
            });
            setTimeout(() => {
                document.getElementById('popup').style.display = 'none';
                window.location.href = 'view_feedback.php';
            }, 2000);
        } else {
            // Display error message if submission fails
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while submitting the feedback. Please try again.');
    });
});
