import axios from "axios";
// import { interceptorRequest, interceptorReponse } from "./interceptor";

const quotationApi = axios.create({
    baseURL: "/api/web/quotation",
});

// quotationApi.interceptors.request.use(interceptorRequest);
// quotationApi.interceptors.response.reject(interceptorReponse);

export default quotationApi;
