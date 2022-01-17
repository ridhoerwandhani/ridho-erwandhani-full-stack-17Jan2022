import {
    getRestoListStarted, getRestoListSuccess, getRestoListFailure,
    addRestoStarted, addRestoSuccess, addRestoFailure,
    addToCollectionStarted, addToCollectionSuccess, addToCollectionFailure
 } from "./index";
 export const getRestoList = (name,date,time) => async dispatch => {
    dispatch(getRestoListStarted());
    try {
       const res = await fetch('http://108.137.2.123/resto/getListRestaurant.php?name='+name+"&date="+date+"&time="+time);
       const data = await res.json();
       var items = [];
       data.forEach((item) => {
          let newItem = {
             id: item.id,
             name: item.name,
             schedule: item.schedule
          }
          items.push(newItem)
       });
       dispatch(getRestoListSuccess(items));
    } catch (err) {
       dispatch(getRestoListFailure(err.message));
    }
 }

 export const getCollectionList = () => async dispatch => {
   dispatch(getRestoListStarted());
   try {
      const res = await fetch('http://108.137.2.123/resto/getListCollection.php');
      const data = await res.json();
      var items = [];
      data.forEach((item) => {
         let newItem = {
            id: item.id,
            name: item.name,
            schedule: item.schedule
         }
         items.push(newItem)
      });
      dispatch(getRestoListSuccess(items));
   } catch (err) {
      dispatch(getRestoListFailure(err.message));
   }
}

 export const addResto = (data) => async dispatch => {
    dispatch(addRestoStarted());
 
    let newItem = {
       name: data.name,
       amount: data.amount,
       spend_date: data.spendDate,
       category: data.category
    }
    console.log(newItem);
    try {
       const res = await fetch('http://108.137.2.123/resto/getListRestaurant.php', {
          method: 'POST',
          body: JSON.stringify(newItem),
          headers: {
             "Content-type": "application/json; charset=UTF-8"
          } 
       });
       const data = await res.json();
       newItem.id = data._id;
       dispatch(addRestoSuccess(newItem));
    } catch (err) {
       console.log(err);
       dispatch(addRestoFailure(err.message));
    }
 }
 export const addToCollection = (id) => async dispatch => {
    dispatch(addToCollectionStarted());
    try {
       const res = await fetch('http://108.137.2.123/resto/addRestaurantToCollection.php?resto='+id);
       const data = await res.json();
       dispatch(addToCollectionSuccess(id));
    } catch (err) {
       dispatch(addToCollectionFailure(err.message));
    }
 }