import axios from "axios";

const getItems = async () => {
    // http://127.0.0.1:8000/api/menu
    try {
        const fetchedData = await axios.get('http://127.0.0.1:8000/api/menu');
        return fetchedData.data;
    } catch(e) {
        console.error(`Error fetching data: ${e}`);
        return [];
    }
};

export { getItems };