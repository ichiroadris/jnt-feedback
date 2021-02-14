<template>
    <div class="min-h-screen bg-red-100 p-7">
        <div class="bg-white rounded-md shadow py-14 px-6 min-h-full">
            <div class="flex justify-end">
                <div class="">
                    <inertia-link
                        href="/dashboard"
                        v-if="$page.props.user"
                        class="px-4 py-2 font-bold leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                        >Dashboard</inertia-link
                    >
                    <inertia-link
                        href="/login"
                        v-else
                        class="px-4 py-2 font-bold leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                        >Login</inertia-link
                    >
                </div>
            </div>
            <div class="flex justify-center my-16">
                <a href="https://www.jtexpress.my/" class="self-center"
                    ><img src="/img/jnt-logo.png" alt="" class="w-96"
                /></a>
            </div>
            <div class="">
                <form id="form" @submit.prevent="submit">
                    <button

                        @click="submit"
                        class="px-8 py-4 mt-4 font-bold leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                    >
                        Submit
                    </button>
                    <textarea
                        name=""
                        id=""
                        cols="30"
                        rows="10"
                        v-model="form.comment"
                        class="mt-12 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="Enter comment"
                    ></textarea>

                    <fieldset class="stars">
                        <input
                            type="radio"
                            name="stars"
                            v-model="form.star"
                            value="1"
                            id="star1"
                            ontouchstart="ontouchstart"
                        />
                        <label class="fa fa-star" for="star1"></label>
                        <input
                            type="radio"
                            name="stars"
                            v-model="form.star"
                            required
                            value="2"
                            id="star2"
                            ontouchstart="ontouchstart"
                        />
                        <label class="fa fa-star" for="star2"></label>
                        <input
                            type="radio"
                            name="stars"
                            v-model="form.star"
                            value="3"
                            id="star3"
                            ontouchstart="ontouchstart"
                        />
                        <label class="fa fa-star" for="star3"></label>
                        <input
                            type="radio"
                            name="stars"
                            v-model="form.star"
                            value="4"
                            id="star4"
                            ontouchstart="ontouchstart"
                        />
                        <label class="fa fa-star" for="star4"></label>
                        <input
                            type="radio"
                            name="stars"
                            v-model="form.star"
                            value="5"
                            id="star5"
                            ontouchstart="ontouchstart"
                        />
                        <label class="fa fa-star" for="star5"></label>
                        <input type="radio" name="stars" id="star-reset" />
                        <label class="reset" for="star-reset">reset</label>
                        <figure class="face">
                            <i></i><i></i>
                            <u>
                                <div class="cover"></div>
                            </u>
                        </figure>
                    </fieldset>
                </form>
            </div>
            <div v-if="$page.props.flash.message">
                {{ $page.props.flash.message }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                star: null,
                comment: null
            })
        };
    },
    methods: {
        submit() {
            if (this.form.star && this.form.comment) {
                // this.$inertia.post("/feedback/create", this.form);
                // this.form.reset();
                this.form.post('/feedback/create',)
                this.form.reset()
            }
        }
    },
    created() {
        console.log(this.$page);
    }
};
</script>

<style scoped>
#form {
    display: flex;
    flex-direction: column-reverse;
    justify-content: center;
    align-items: center;
    max-width: 800px;
    height: 100%;
    margin: auto;
}
[class*="fontawesome-"]:before {
    font-family: "FontAwesome", sans-serif;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    width: 100%;
    height: 100%;
}
.reset {
    display: none;
    position: absolute;
    top: 90%;
    left: 50%;
    margin: auto;
    padding: 12px 24px;
    color: #4d4d4d;
    background: #f0f0f0;
    border-radius: 60px;
    font-family: "Helvetica", sans-serif;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    cursor: pointer;
    outline: none;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
}
.reset:hover {
    background: #fbc416;
}
input,
label {
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
.stars {
    position: relative;
}
.stars input {
    display: none;
}
.stars input:checked ~ label:not(.reset) {
    -webkit-animation: wobble 0.8s ease-out;
    animation: wobble 0.8s ease-out;
    color: #fbc416;
}
.stars input:checked:not(#star-reset) ~ label.reset {
    display: block;
}
.stars label:not(.reset) {
    display: inline-block;
    float: right;
    position: relative;
    width: 40px;
    height: 40px;
    font-size: 40px;
    padding: 2px;
    cursor: pointer;
    color: #3d3d3d;
    transition: color 0.1s ease-out;
    z-index: 10;
}
.face {
    position: relative;
    width: 200px;
    background: white;
    border: 6px solid #f0f0f0;
    border-radius: 100%;
    margin: 80px 0 50px;
    transition: box-shadow 0.4s ease-out;
}
.face:after {
    content: "";
    display: block;
    padding-bottom: 100%;
}
i {
    position: absolute;
    top: 50%;
    display: block;
    width: 14px;
    height: 14px;
    border-radius: 100%;
    background: #f0f0f0;
}
i:nth-child(1) {
    left: 30%;
}
i:nth-child(2) {
    right: 30%;
}
u {
    position: absolute;
    right: 0;
    bottom: 25%;
    left: 0;
    margin: auto;
    width: 24px;
    height: 24px;
    text-decoration: none;
    border: 6px solid #f0f0f0;
    border-radius: 100%;
}
u:before,
u:after {
    content: "";
    position: absolute;
    top: 15px;
    width: 6px;
    height: 6px;
    background: #f0f0f0;
    border-radius: 60px 60px 0 0;
    z-index: 2;
}
u:before {
    left: -5px;
    -webkit-transform: rotate(-32deg);
    transform: rotate(-32deg);
}
u:after {
    right: -5px;
    -webkit-transform: rotate(32deg);
    transform: rotate(32deg);
}
u .cover {
    position: absolute;
    top: -6px;
    left: -6px;
    width: 100%;
    height: 100%;
    border: 6px solid white;
    background: white;
    -webkit-transform: translate(0, -12px);
    transform: translate(0, -12px);
}

input#star4:checked ~ .face u,
input#star2:checked ~ .face u {
    width: 36px;
}
input#star4:checked ~ .face u:before,
input#star4:checked ~ .face u:after,
input#star2:checked ~ .face u:before,
input#star2:checked ~ .face u:after {
    top: 18px;
    height: 10px;
}
input#star4:checked ~ .face u:before,
input#star2:checked ~ .face u:before {
    left: 0px;
    -webkit-transform: rotate(-66deg);
    transform: rotate(-66deg);
}
input#star4:checked ~ .face u:after,
input#star2:checked ~ .face u:after {
    right: 0px;
    -webkit-transform: rotate(66deg);
    transform: rotate(66deg);
}
input#star4:checked ~ .face u .cover,
input#star2:checked ~ .face u .cover {
    -webkit-transform: translate(0, -8px);
    transform: translate(0, -8px);
}

input#star5:checked ~ .face u,
input#star4:checked ~ .face u {
    -webkit-transform: rotate(180deg) translateY(-20px);
    transform: rotate(180deg) translateY(-20px);
}

input#star3:checked ~ .face u {
    width: 42px;
    height: 6px;
    background: #3d3d3d;
    border: none;
    border-radius: 60px;
    -webkit-transform: translateY(-4px);
    transform: translateY(-4px);
}
input#star3:checked ~ .face u:before,
input#star3:checked ~ .face u:after,
input#star3:checked ~ .face u .cover {
    display: none;
}

input:not(#star-reset):checked ~ .face {
    -webkit-animation: wobble 0.8s ease-out;
    animation: wobble 0.8s ease-out;
}
input:not(#star-reset):checked ~ .face,
input:not(#star-reset):checked ~ .face u {
    border-color: #3d3d3d;
}
input:not(#star-reset):checked ~ .face i,
input:not(#star-reset):checked ~ .face u:before,
input:not(#star-reset):checked ~ .face u:after {
    background: #3d3d3d;
}

input#star5:checked ~ .face {
    background-color: #fa5563;
}
input#star5:checked ~ .face u .cover {
    background: #fa5563;
    border-color: #fa5563;
}

input#star4:checked ~ .face {
    background-color: #fa824e;
}
input#star4:checked ~ .face u .cover {
    background: #fa824e;
    border-color: #fa824e;
}

input#star3:checked ~ .face {
    background-color: #fccd3f;
}

input#star2:checked ~ .face {
    background-color: #a0d77a;
}
input#star2:checked ~ .face u .cover {
    background: #a0d77a;
    border-color: #a0d77a;
}

input#star1:checked ~ .face {
    background-color: #6bca6c;
}
input#star1:checked ~ .face u .cover {
    background: #6bca6c;
    border-color: #6bca6c;
}

@-webkit-keyframes wobble {
    0% {
        -webkit-transform: scale(0.8);
        transform: scale(0.8);
    }
    20% {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    40% {
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
    }
    60% {
        -webkit-transform: scale(1.05);
        transform: scale(1.05);
    }
    80% {
        -webkit-transform: scale(0.96);
        transform: scale(0.96);
    }
    100% {
        -webkit-transform: scale(1);
        transform: scale(1);
    }
}

@keyframes wobble {
    0% {
        -webkit-transform: scale(0.8);
        transform: scale(0.8);
    }
    20% {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    40% {
        -webkit-transform: scale(0.9);
        transform: scale(0.9);
    }
    60% {
        -webkit-transform: scale(1.05);
        transform: scale(1.05);
    }
    80% {
        -webkit-transform: scale(0.96);
        transform: scale(0.96);
    }
    100% {
        -webkit-transform: scale(1);
        transform: scale(1);
    }
}
</style>
