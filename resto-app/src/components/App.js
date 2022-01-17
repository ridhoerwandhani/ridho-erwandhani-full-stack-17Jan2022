import React from "react";
import {
   BrowserRouter as Router,
   Link,
   Switch,
   Route
} from 'react-router-dom';

import './App.css';
import Home from './Home';
import RestoEntryItemList from './RestoEntryItemList';
import CollectionList from './CollectionList';

class App extends React.Component {
   render() {
      return (
         <Router>
            <div>
               <nav>
                  <ul>
                     <li><Link to="/">Home</Link></li>
                     <li><Link to="/list">List Resto</Link></li>
                     <li><Link to="/add">My Collection</Link></li>
                  </ul>
               </nav>

               <Switch>
                  <Route path="/list">
                     <div style={{ padding: "10px 0px" }}>
                        <RestoEntryItemList />
                     </div>
                  </Route>
                  <Route path="/add">
                     <div style={{ padding: "10px 0px" }}>
                        <CollectionList />
                     </div>
                  </Route>
                  <Route path="/">
                     <div>
                        <Home />
                     </div>
                  </Route>
               </Switch>
            </div>
         </Router>
      );
   }
}
export default App;