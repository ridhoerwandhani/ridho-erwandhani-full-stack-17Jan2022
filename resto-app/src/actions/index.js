import {
    LIST_RESTO_STARTED, LIST_RESTO_SUCCESS, LIST_RESTO_FAILURE,
    ADD_RESTO_STARTED, ADD_RESTO_SUCCESS, ADD_RESTO_FAILURE,
    ADD_TO_COLLECTION_STARTED, ADD_TO_COLLECTION_SUCESS, ADD_TO_COLLECTION_FAILURE,
 } from "./types";
 export const getRestoListStarted = () => {
    return {
       type: LIST_RESTO_STARTED
    }
 }
 export const getRestoListSuccess = data => {
    return {
       type: LIST_RESTO_SUCCESS,
       payload: {
          data
       }
    }
 }
 export const getRestoListFailure = error => {
    return {
       type: LIST_RESTO_FAILURE,
       payload: {
          error
       }
    }
 }
 export const addRestoStarted = () => {
    return {
       type: ADD_RESTO_STARTED
    }
 }
 export const addRestoSuccess = data => {
    return {
       type: ADD_RESTO_SUCCESS,
       payload: {
          data
       }
    }
 }
 export const addRestoFailure = error => {
    return {
       type: ADD_RESTO_FAILURE,
       payload: {
          error
       }
    }
 }
 export const addToCollectionStarted = () => {
    return {
       type: ADD_TO_COLLECTION_STARTED
    }
 }
 export const addToCollectionSuccess = data => {
    return {
       type: ADD_TO_COLLECTION_SUCESS,
       payload: {
          data
       }
    }
 }
 export const addToCollectionFailure = error => {
    return {
       type: ADD_TO_COLLECTION_FAILURE,
       payload: {
          error
       }
    }
 }