import Router from 'koa-router';

import bodyParser from 'raw-body';

const router = Router();

//hello world
router.get('/', (ctx, next)=>{
    console.log(ctx.session);
    ctx.session.views ++;
    ctx.body = 'hello world';
})

//render template with parameter
router.get('/template', (ctx, next)=>{
    ctx.cookies.set('username','abot');
    ctx.render('view/index', {author: "Abot",to: ctx.cookies.get('username')});
});

//assign variables in middleware
router.get('/middle', (ctx, next)=>{
    ctx.render('view/middle',ctx.state);
});

//get parameter from querystring, test /get/get?q=hello
router.get('/get/:type', (ctx, next)=>{
    const type = ctx.params.type;
    const {q:kw} = ctx.request.query;
    ctx.render('view/get',{type,kw});
});

//form post/form data/raw post/payload post
//form urlencode
router.all('/post/form', (ctx, next)=>{
    console.log(ctx.request.body);
    const {name} = ctx.request.body;
    console.log(name);
    ctx.render('view/post',{name});

});
//raw post, to add tests
router.all('/post/raw', (ctx, next)=>{
    // console.log(ctx.request);
    // getRawBody();
    // const json = JSON.parse(ctx.request.body);
    // const {name} = json;
    // console.log(name);
    // ctx.render('view/post',{name});

})

router.get('/post/payload', (ctx, next)=>{
    ctx.render('view/post_payload');
})
router.post('/post/payload', (ctx, next)=>{
    console.log(ctx.request.body);
    const {name} = ctx.request.body;
    ctx.body = name;
});
//db

//session, cookie


//upload file




export default router;