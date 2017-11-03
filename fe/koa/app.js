import Koa from 'koa';
import bodyParser from 'koa-body';
import router from './router';
import Pug from 'koa-pug';
import session from 'koa-session';
import setUser from './user';

var app = new Koa();

app.use((ctx, next)=>{
    console.log(`${ctx.method} ${ctx.url}`);
    const start = new Date();
    return next().then(()=>{
        const ms = new Date() - start;
        console.log(`processing time: ${ms}ms`);
    });
});

app.keys = ['hello everyone'];
var CONFIG = {
  key: 'koa:sess', /** (string) cookie key (default is koa:sess) */
  maxAge: 86400000, /** (number) maxAge in ms (default is 1 days) */
  overwrite: true, /** (boolean) can overwrite or not (default true) */
  httpOnly: true, /** (boolean) httpOnly or not (default true) */
  signed: false, /** (boolean) signed or not (default true) */
};

app.use(session(CONFIG, app));

app.use(bodyParser());

app.use(setUser);

app.use(router.routes()).use(router.allowedMethods());

app.on('error', function(err, ctx){
  console.log(err)
  logger.error('server error', err, ctx);
});
// pug.use(app);
new Pug({app});
app.listen(3000);