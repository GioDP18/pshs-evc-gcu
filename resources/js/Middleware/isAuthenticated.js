import axios from 'axios';

const isAuthenticated = async () => {
    // Check if the user has a valid JWT token in local storage or cookies
    const token = localStorage.getItem('token');
    const validity = localStorage.getItem('valid');

    try {
        const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/api/v1/check-auth`, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });

        console.log(response.data)

        // If the response indicates successful authentication, return true
        if (response.data.success) {
            return true;
        } else {
            // If not authenticated, update validity status and return false
            localStorage.setItem('valid', false);
            return false;
        }
    } catch (error) {
        console.error('Error while checking authentication:', error);
        // Handle errors here if needed
        return false;
    }
};

export default isAuthenticated;
