<template>
  <div class="progress-loader" :hidden="!isLoading">
    <div id="overlay"></div>
    <div class="ring">
      <span></span>
    </div>
  </div>
</template>
<script>
export default {
  name: "Loader",
   inject: ['isLoading'],
  data: () => ({
  }),
  created() {
  }
};
</script>
<style>
.progress-loader {
    position: relative;
    z-index: 9999;
  #overlay {
    position: fixed;
    display: block;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.25);
    z-index: 6;
  }
  .ring {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 100px;
    background: transparent;
    border: 3px solid rgba(255, 255, 255, 0.25);
    border-radius: 50%;
    text-align: center;
    line-height: 100px;
    font-family: sans-serif;
    font-size: 12px;
    color: #0747a6;
    letter-spacing: 4px;
    text-transform: uppercase;
    text-shadow: 0 0 10px #0747a6;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    z-index: 10;
    span {
      display: block;
      position: absolute;
      top: calc(50% - 2px);
      left: 50%;
      width: 50%;
      height: 4px;
      background: transparent;
      transform-origin: left;
      animation: animate 1s linear infinite;
      &::before {
        content: "";
        position: absolute;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #313B47;
        top: -5px;
        right: -3px;
        box-shadow: 0 0 20px #313B47;
      }
    }
    &:before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 3px solid transparent;
      border-top: 3px solid #313B47;
      border-right: 3px solid #313B47;
      border-radius: 50%;
      animation: animateCircle 1s linear infinite;
    }
  }
  @keyframes animateCircle {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
  @keyframes animate {
    0% {
      transform: rotate(45deg);
    }
    100% {
      transform: rotate(405deg);
    }
  }
}
</style>