module.exports = {
  apps : [{
    name: "app",
    script: "./app.js",
    watch: ['./app.js'],
    env: {
      NODE_ENV: "development",
    },
    env_production: {
      NODE_ENV: "production",
    }
  },
  {
    name: "image",
    script: "./image.js",
    watch: ['./image.js'],
    env: {
      NODE_ENV: "development",
    },
    env_production: {
      NODE_ENV: "production",
    }
  }]
}