import axios from "axios";
// import { interceptorRequest, interceptorReponse } from "./interceptor";

const settingApi = axios.create({
    baseURL: "/api/web/setting",
});

// settingApi.interceptors.request.use(interceptorRequest);
// settingApi.interceptors.response.reject(interceptorReponse);

export default settingApi;
