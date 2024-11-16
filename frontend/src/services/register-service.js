import axios from "axios";

const registerCustomer = async (data) => {
    let response = null;
    try {
        const createdUser = await axios.post(`http://127.0.0.1:8000/api/customer/create`, data);
        response = createdUser;
    } catch (error) {
        console.error(`Error creating customer`);
        response = error;
    }

    return response;
};

export { registerCustomer };