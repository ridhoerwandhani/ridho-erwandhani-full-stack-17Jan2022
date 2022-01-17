import {
    LIST_RESTO_STARTED, LIST_RESTO_SUCCESS, LIST_RESTO_FAILURE,
    ADD_RESTO_STARTED, ADD_RESTO_SUCCESS, ADD_RESTO_FAILURE,
    ADD_TO_COLLECTION_STARTED, ADD_TO_COLLECTION_SUCESS, ADD_TO_COLLECTION_FAILURE
 } from "../actions/types";
 
 // define initial state of user
 const initialState = {
    data: null,
    loading: false,
    error: null
 }
 export default function restoReducer(state = initialState, action) {
    switch (action.type) {
       case LIST_RESTO_STARTED:
          return {
             ...state,
             loading: true
          }
       case LIST_RESTO_SUCCESS:
          const { data } = action.payload;
          return {
             ...state,
             data,
             loading: false
          }
       case LIST_RESTO_FAILURE:
          const { error } = action.payload;
          return {
             ...state,
             error
          }
       case ADD_RESTO_STARTED:
          return {
             ...state,
             loading: true
          }
       case ADD_RESTO_SUCCESS:
          return {
             ...state,
             loading: false
          }
       case ADD_RESTO_FAILURE:
          const { restoError } = action.payload;
          return {
             ...state,
             restoError
          }
       case ADD_TO_COLLECTION_STARTED:
          return {
             ...state,
             loading: true
          }
       case ADD_TO_COLLECTION_SUCESS:
          return {
             ...state,
             data: state.data.filter(resto => resto.id !== action.payload.data),
             loading: false
          }
       case ADD_TO_COLLECTION_FAILURE:
          const { addToCollectionError } = action.payload;
          return {
             ...state,
             addToCollectionError
          }
       default:
          return state
    }
 }