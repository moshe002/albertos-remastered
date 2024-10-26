<script setup>
import { registerCustomer } from '../../services/register-service';

const formElementValues = [
    { id: 'name', type: 'text', placeholder: 'Enter your fullname' },
    { id: 'password', type: 'password', placeholder: 'Enter your password' },
    { id: 'address', type: 'text', placeholder: 'Enter your full address' },
    { id: 'email', type: 'email', placeholder: 'Enter your email' },
    { id: 'phone_number', type: 'number', placeholder: 'Enter your phone number' },
];

const handleRegister = async (event) => {
    event.preventDefault();

    let formData = {};
    for (const element of event.target.elements) {
        if (element.name) {
            formData[element.name] = element.value;
        }
    }

    try {
        const response = await registerCustomer(formData);
        console.log("response: ", response);
    } catch (error) {
        console.log(error);
    }
};

</script>

<template lang="">
    <div class="border-2 border-black p-10">
        <form @submit="handleRegister" method="POST">
            <div
                class="flex flex-col justify-evenly items-center p-5" 
                v-for="(values, index) in formElementValues"
            >
                <input
                    class="border-2 p-1"
                    :type="values.type"
                    :id="values.id"
                    :name="values.id"
                    :key="index"
                    :placeholder="values.placeholder"
                    required
                />
            </div>
            <button class="" type="submit">REGISTER</button>
        </form>
    </div>
</template>

<style lang="">
    
</style>