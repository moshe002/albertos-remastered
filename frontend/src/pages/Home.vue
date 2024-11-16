<script setup>
const contacts = [
    { name: 'Facebook', value: 'https://www.facebook.com/albertospizza' },
    { name: 'Phone', value: '(032) 512 5998' },
    { name: 'Email', value: 'albertospizzamain' },
];

// :style="{ backgroundImage: 'url(../../public/images/bg.png)' }"

</script>

<template lang="">
    <div :class="[
            'flex flex-col justify-evenly items-center pt-28 h-screen w-full',
        ]"
    >
        <div class="text-center">
            <h1 class="text-4xl font-bold text-orange-400">Welcome to Albertos</h1>
            <p class="italic text-xs">A taste you'll surely miss...</p>
        </div>
        <section class="flex justify-center p-5 mt-20">
            <p class="text-justify w-[50%]">
                Albertos is a pizza chain located in the Philippines. 
                It has its original and unique menu of pizzas that are affordable and are delicious. 
                Albertos pizza stores are located everywhere. A city or a province can house up 
                to 5 albertos stores. It is a well known pizzaria in the country that is making 
                filipinos come back for more. With its affordable prices, it is surely going to 
                make you not regret buying. It has a huge range of items, from having a breakfast 
                menu to desserts. Albertos pizzaria will surely make your hunger go away.
            </p>
        </section>
        <section class="flex flex-col justify-center items-center p-5 mt-10 gap-10">
            <h1 class="text-4xl font-bold text-orange-400">Contact us here</h1>
            <ul class="p-3 w-full">
                <li 
                    v-for="(contact, index) in contacts"
                    :key="index"
                    class="flex justify-between m-3"
                >
                    <p>{{ contact.name }}:</p>
                    <a v-if="contact.name == 'Facebook'" :href="contact.value">
                        Alberto's Page
                    </a>
                    <p v-else>{{ contact.value }}</p>
                </li>
            </ul>
        </section>
    </div>
</template>

<style lang="">
    
</style>