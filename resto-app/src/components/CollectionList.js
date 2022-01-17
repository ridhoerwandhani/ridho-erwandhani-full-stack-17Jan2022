import React from "react";
import { connect } from 'react-redux';
import { getCollectionList } from '../actions/restoActions';

class CollectionList extends React.Component {
   constructor(props) {
      super(props);
   }
   componentDidMount() {
      console.log("Hai");
      this.props.getCollectionList();
   }
   render() {
      console.log("rerender2");
      let lists = [];
      if (this.props.collections != null) {
         lists = this.props.collections.map((item) =>
            <tr key={item.id}>
               <td>{item.name}</td>
            </tr>
         );
      }
      return (
         <div>
            <table>
               <thead>
                  <tr>
                     <th>Restaurant Name</th>
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
      collections: state.data
   };
};
const mapDispatchToProps = {
   getCollectionList
};
export default connect(
   mapStateToProps,
   mapDispatchToProps
)(CollectionList);