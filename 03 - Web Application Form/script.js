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

    if (!name || name === '123456790') {
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

document.getElementById('submit').addEventListener('click', (e) => {
    if (!formValidation()) {
        e.preventDefault(); // prevents form submission if validation fails
    }
    // console.log('Form validation failed')
});
