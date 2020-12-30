// import express
import express from "express";

// import fileupload
import fileupload from "express-fileupload";

// import cors
import cors from "cors";
// import routes
import Router from "./routes/routes.js";
 
// init express
const app = express();
 
// use express json
app.use(express.json());
 
// use cors
app.use(cors());

// Public Folder
app.use(express.static('./public'));

// use fileUpload
app.use(fileupload());
 
// use router
app.use(Router);
 
app.listen(5000, () => console.log('Server running at http://localhost:5000'));