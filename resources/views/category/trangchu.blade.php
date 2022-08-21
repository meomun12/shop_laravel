<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script>
        var express = require('express');
        var app = express();
        app.get('/', function(req,res){
            res.req('đây là trang chủ');

        })
         var server = app.listen(8000,function(){
             var host = serve .address().address()
             var port = serve.address().port()
         })
         console.log('logout ra khỏi trang chủ' $host $port)
    </script>
<script>
    const mongoose = require('mongoose')
    mongoose.Promise = global.Promise
    const Schema = mongoose.Schema 
    const bookSchema =Schema({
        name:{
            tpe: String,
            trim:True,
            required:"please enter a book name"
        },
        description:{
            type:String,
            trim:true,  
        },
        author:{
            type:String,
            trim:true,
        },
        genre:[{
            type:Schema.Types.ObjectId,
            ref:'Genre'
        }]

    })
    module.exports = mongoose.model('Book', bookSchema)
</script>
<script>
        router.get('/add',(req,res,next)=>{
            res.render('addGenre')
        })
        //2
        router.post('/add',(req,res,next)=>{
            requ.checkBody('name','name is require').notEmpty()
            const error = req.validationErrors()
            if(errors){
                console.log(errors)
                res.render('addGenre',{genre errors})
            }
            const genre = (new Genre(req.body).save()
                           .then(data)=>{
                               res.redirect('/genres')
                           })
                           .catch((errors)=>{
                               console.log('ooops...')
                               console.log(erros)
                           })
        })

</script>
<script>
    var express = require('express');
    var router = express.router();
    const mongoose = require('mongoose');
    const Book = require('.../models/book');
    const Genre = require('.../models/Genre');
</script>
<script>
    router.post('/add',(req res next)=>{
        req.checkBody('name', 'Name is required').notEmpty()
  req.checkBody('description', 'Description is required').notEmpty()
  req.checkBody('genre', 'Genre is required').notEmpty
 
  const errors = req.validationErrors()
 
  if (errors) {
    console.log(errors)
    res.render('addBooks', { book, errors })
  }
 
  const book = (new Book(req.body)).save()
    .then((data) => {
      res.redirect('/books')
    })
    .catch((errors) => {
      console.log('oops...')
    })

    })
</script>
<script>
    router.get('/show/:id',(req,res,next)=>{
        const book = Book.findById({ _id: req.params.id })
  .populate({
    path: 'genre',
    model: 'Genre',
    populate: {
      path: 'genre',
      model: 'Book'
    }
  })
  .exec()
    .then((book) => {
      res.render('book', { book })
    })
    .catch((err) => {
      throw err
    })
    })
    module.exports = router;
</script>
<script>
    var sqlite3 = require('sqlite3');
    
</script>
<script>
    
</script>

</body>
</html>