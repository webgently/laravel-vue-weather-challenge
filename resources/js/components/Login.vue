<template>
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md: h-screen lg:py-0">
    <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
      <img
        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
        class="w-full w-40 h-32"
        alt="logo"
      />
    </a>
    <div
      class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"
    >
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
          Login In
        </h1>
        <Form @submit="handleLogin" :validation-schema="schema" class="space-y-4 md:space-y-6">
          <div class="pt-4">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <Field
              name="email"
              type="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="name@company.com"
            />
            <ErrorMessage name="email" class="absolute text-sky-400 lg:text-sm md:text-sm text-xs pt-1" />
          </div>
          <div class="pt-4">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <Field
              type="password"
              name="password"
              placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            />
            <ErrorMessage name="password" class="absolute text-sky-400 lg:text-sm md:text-sm text-xs pt-1" />
          </div>
          <div class="pt-4">
            <button
              :disabled="loading"
              class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              <span v-show="loading" class="spinner-border spinner-border-sm"></span>
              Login
            </button>
          </div>
          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Don't have an account?
            <router-link to="/register" class="font-medium hover:underline">Register</router-link>
          </p>
          <div v-if="message" class="alert alert-danger" role="alert">
            {{ message }}
          </div>
        </Form>
      </div>
    </div>
  </div>
</template>

<script>
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
export default {
  name: 'LOGIN',
  components: {
    Form,
    Field,
    ErrorMessage
  },
  data() {
    const schema = yup.object().shape({
      email: yup.string().required('Email is required!').email('Email is invalid!'),
      password: yup.string().required('Password is required!')
    });
    return {
      loading: false,
      message: '',
      schema
    };
  }
};
</script>
