export default async function(ctx, next) {
    ctx.state.username = "Test";

    return await next();
}