import React from "react";
import { connect } from 'react-redux';
import { getRestoList, addToCollection } from '../actions/restoActions';

class RestoEntryItemList extends React.Component {
   constructor(props) {
      super(props);
   }
   componentDidMount() {
      console.log("Hai");
      this.props.getRestoList();
   }
   handleCollection = (id, e) => {
      e.preventDefault();
      this.props.addToCollection(id);
      alert("Restaurant added");
   }

   handleSearch = (event) => {
      event.preventDefault()
      let name = event.target.name.value;
      let date = event.target.date.value;
      let time = event.target.time.value;
      this.props.getRestoList(name, date, time);
   }

   render() {
      console.log("rerender");
      let lists = [];
      if (this.props.restos != null) {
         lists = this.props.restos.map((item) =>
            <tr key={item.id}>
               <td>{item.id}</td>
               <td>{item.name}</td>
               <td>
                  {item.schedule.map(itemSchedule => {
                     return <tr><td>{itemSchedule.day} {itemSchedule.startat}-{itemSchedule.endat}</td></tr>;
                  })}
               </td>
               <td><a href="#"
                  onClick={(e) => this.handleCollection(item.id, e)}>Save to Collection</a>
               </td>
            </tr>
         );
      }
      return (
         <div>


            <form onSubmit={this.handleSearch}>
               <label for="name">Restaurant Name </label>
               <input type="text" id="name" name="name" placeholder="Enter restaurant name" />

               <label for="date">Date </label>
               <input type="date" id="date" name="date" placeholder="Enter date" />

               <label for="time">Time </label><br/>
               <input type="time" id="time" name="time" placeholder="Enter time" />

               <input type="submit" value="Search" />
            </form>

            <table>
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Restaurant Name</th>
                     <th>Opening Hours</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  {lists}
               </tbody>
            </table>
         </div>
      );
   }
}
const mapStateToProps = state => {
   console.log("mapStateToProps");
   return {
      restos: state.data
   };
};
const mapDispatchToProps = {
   getRestoList,
   addToCollection
};
export default connect(
   mapStateToProps,
   mapDispatchToProps
)(RestoEntryItemList);